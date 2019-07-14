<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Repository\ProductRepository;
use AdventistCommons\Domain\Validation\ProductValidator;

class ProductBuilder
{
	private $productHydrator;
	private $ProductRepository;

	public function __construct(ProductHydrator $productHydrator, ProductRepository $ProductRepository)
	{
		$this->productHydrator = $productHydrator;
		$this->ProductRepository = $ProductRepository;
	}

	public function buildOrUpdateFromArray(array $productData): Product
	{
		$product = null;
		if (isset($productData['id']) && $productData['id']) {
			$product = $this->ProductRepository->find($productData['id']);
		}
		$product = $this->productHydrator->hydrate($productData, $product, false);
		ProductValidator::validate($product);

		return $product;
	}
}
