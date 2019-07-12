<?php

namespace AdventistCommons\Domain\EntityBuilder;

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
		if (isset($productData['id'])) {
				
		} else {
			$product = $this->productHydrator->hydrate($productData);
		}
		ProductValidator::validate($product);

		return $product;
	}
}
