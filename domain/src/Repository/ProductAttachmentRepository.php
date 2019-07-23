<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Entity\ProductAttachment;
use AdventistCommons\Domain\Hydrator\Hydrator;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductAttachmentRepository
{
    private $productAttachmentFinder;
    private $commonHydrator;

    public function __construct(ProductAttachmentFinderInterface $productAttachmentFinder, Hydrator $commonHydrator)
    {
        $this->productAttachmentFinder = $productAttachmentFinder;
        $this->commonHydrator = $commonHydrator;
    }

    public function find($id)
    {
        $data = $this->productAttachmentFinder->getProductAttachmentStructure($id);
        if (!$data) {
            return null;
        }
        $product = $this->commonHydrator->hydrate(ProductAttachment::class, reset($data['product_attachment']));

        return $product;
    }
}
