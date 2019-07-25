<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Entity\ProductAttachment;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ProductAttachmentRepository
{
    private $productAttachFinder;
    private $commonHydrator;

    public function __construct(ProductAttachmentFinderInterface $productAttachFinder, Hydrator $commonHydrator)
    {
        $this->productAttachFinder     = $productAttachFinder;
        $this->commonHydrator          = $commonHydrator;
    }

    public function find($entityId)
    {
        $data = $this->productAttachFinder->getProductAttachmentStructure($entityId);
        if (! $data) {
            return null;
        }
        $product = $this->commonHydrator->hydrate(ProductAttachment::class, reset($data['product_attachment']));

        return $product;
    }
}
