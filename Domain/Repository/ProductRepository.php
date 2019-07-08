<?php

namespace AdventistCommons\Domain\Repository;
use AdventistCommons\Domain\EntityBuilder\ProductHydrator;

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
		$data = $this->productFinder->getProductWithAttachmentsAndProjects($id);
		if (!$data) {
			return null;
		}

		$product = $this->productHydrator->hydrate($data[0], $data);

		return $product;
	}
}
