<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\UploadedCollection;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

class ProductHydrator extends Hydrator
{
	private $productFileHydrator;
	private $productForeignHydrator;
	
	public function __construct(ProductFileHydrator $productFileHydrator, ProductForeignHydrator $productForeignHydrator)
	{
		$this->productFileHydrator = $productFileHydrator;
		$this->productForeignHydrator = $productForeignHydrator;
	}
	
	public function hydrate(array $productData, UploadedCollection $uploadedCollection = null, Product $product = null, $useCache = true)
	{
		if ($useCache && isset($productData['id']) && $existing = $this->getCache($productData['id'])) {
			return $existing;
		}
		
		$productData = $this->productFileHydrator->buildFiles($productData);
		
		$product = Hydrator::hydrateProperties(
			$product ?? new Product(),
			$productData
		);
		if ($uploadedCollection) {
			$product = Hydrator::hydrateProperties(
				$product,
				$uploadedCollection
			);
		}
		
		$product = $this->productForeignHydrator->hydrate($productData, $product);
				
		if (isset($productData['id'])) {
			$this->setCache($productData['id'], $product);
		}
		
		return $product;
	}
}
