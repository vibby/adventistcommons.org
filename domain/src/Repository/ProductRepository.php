<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\EntityHydrator\Hydrator;

/**
 * Class ProductRepository
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductRepository
{
	private $productFinder;
	private $commonHydrator;

	public function __construct(ProductFinderInterface $productFinder, Hydrator $commonHydrator)
	{
		$this->productFinder = $productFinder;
		$this->commonHydrator = $commonHydrator;
	}

	public function findWithAttachmentsAndProjects($id)
	{
		$data = $this->productFinder->getProductStructureWithAttachmentsAndProjects($id);
		if (!$data) {
			return null;
		}
		$product = $this->commonHydrator->hydrate(Product::class, reset($data['product']));

		return $product;
	}

	public function find($id)
	{
		$data = $this->productFinder->getProductStructure($id);
		if (!$data) {
			return null;
		}
		$product = $this->commonHydrator->hydrate(Product::class, reset($data['product']));

		return $product;
	}

	public function findAll()
	{
		$data = $this->productFinder->getProductStructureAll();
		$products = [];
		if ($data) {
			foreach ($data['product'] as $productData) {
				$products[] = $this->commonHydrator->hydrate(Product::class, $productData);
			}
		}

		return $products;
	}
}
