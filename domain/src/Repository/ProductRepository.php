<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Hydrator\Hydrator;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductRepository
{
    private $productFinder;
    private $hydrator;

    public function __construct(ProductFinderInterface $productFinder, Hydrator $hydrator)
    {
        $this->productFinder = $productFinder;
        $this->hydrator = $hydrator;
    }

    public function findWithAttachmentsAndProjects($id)
    {
        $data = $this->productFinder->getProductStructureWithAttachmentsAndProjects($id);
        if (!$data) {
            return null;
        }
        $product = $this->hydrator->hydrate(Product::class, reset($data['product']));

        return $product;
    }

    public function find($id)
    {
        $data = $this->productFinder->getProductStructure($id);
        if (!$data) {
            return null;
        }
        $product = $this->hydrator->hydrate(Product::class, reset($data['product']));

        return $product;
    }

    public function findAll()
    {
        $data = $this->productFinder->getProductStructureAll();
        $products = [];
        if ($data) {
            foreach ($data['product'] as $productData) {
                $products[] = $this->hydrator->hydrate(Product::class, $productData);
            }
        }

        return $products;
    }
}
