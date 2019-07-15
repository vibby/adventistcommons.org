<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\UploadedBuilder;
use AdventistCommons\Domain\Repository\ProductRepository;
use AdventistCommons\Domain\Validation\ProductValidator;
use AdventistCommons\Domain\EntityHydrator\ProductHydrator;

class ProductBuilder
{
	private $productHydrator;
	private $ProductRepository;

	public function __construct(ProductHydrator $productHydrator, ProductRepository $ProductRepository)
	{
		$this->productHydrator = $productHydrator;
		$this->ProductRepository = $ProductRepository;
	}

	public function buildOrUpdateFromArray(array $productData, array $filesData = []): Product
	{
		$product = null;
		if (isset($productData['id']) && $productData['id']) {
			$product = $this->ProductRepository->find($productData['id']);
		}
        foreach ($filesData as $key => $fileData) {
            $productData[$key] = UploadedBuilder::build($fileData);
        }
        $product = $this->productHydrator->hydrate($productData, $product, false);
		ProductValidator::validate($product);

		return $product;
	}
}
