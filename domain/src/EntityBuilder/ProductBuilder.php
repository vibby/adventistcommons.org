<?php

namespace AdventistCommons\Domain\EntityBuilder;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\EntityHydrator\Hydrator;
use AdventistCommons\Domain\File\UploadedBuilder;
use AdventistCommons\Domain\File\UploadedCollection;
use AdventistCommons\Domain\Repository\ProductRepository;
use AdventistCommons\Domain\Validation\ProductValidator;
use AdventistCommons\Domain\EntityHydrator\ProductAbstractHydrator;

class ProductBuilder
{
	private $hydrator;
	private $ProductRepository;
	
	public function __construct(Hydrator $hydrator, ProductRepository $ProductRepository)
	{
		$this->hydrator = $hydrator;
		$this->ProductRepository = $ProductRepository;
	}
	
	public function buildOrUpdateFromArray(array $productData, UploadedCollection $uploadedFiles): Product
	{
		$product = null;
		if (isset($productData['id']) && $productData['id']) {
			$product = $this->ProductRepository->find($productData['id']);
		}
		$product = $this->hydrator->hydrate(
			$product ?? Product::class,
			$productData,
			$uploadedFiles,
			false
		);
		ProductValidator::validate($product);
		
		return $product;
	}
}
