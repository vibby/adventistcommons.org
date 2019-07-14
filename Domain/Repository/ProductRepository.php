<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\EntityHydrator\ProductHydrator;

/**
 * Class ProductRepository
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductRepository
{
	private $productFinder;
	private $productHydrator;

	public function __construct(ProductFinderInterface $productFinder, ProductHydrator $productHydrator)
	{
		$this->productFinder = $productFinder;
		$this->productHydrator = $productHydrator;
	}

	public function findWithAttachmentsAndProjects($id)
	{
		$data = $this->productFinder->getProductStructureWithAttachmentsAndProjects($id);
		if (!$data) {
			return null;
		}
		$product = $this->productHydrator->hydrate(reset($data['product']));

		return $product;
	}

	public function find($id)
	{
		$data = $this->productFinder->getProductStructure($id);
		if (!$data) {
			return null;
		}
		$product = $this->productHydrator->hydrate(reset($data['product']));

		return $product;
	}

	public function findAll()
	{
		$data = $this->productFinder->getProductStructureAll();
		$products = [];
		if ($data) {
			foreach ($data['product'] as $productData) {
				$products[] = $this->productHydrator->hydrate($productData);
			}
		}

		return $products;
	}
}
