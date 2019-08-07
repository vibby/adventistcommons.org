<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Entity\Series;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\ProductAttachment;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class RepositoryLister
{
    private $repositoryByClassName = [];

    public function __construct(array $repositories)
    {
        foreach ($repositories as $repository) {
            if ($repository instanceof ProductRepository) {
                $this->repositoryByClassName[Product::class] = $repository;
            }
            if ($repository instanceof ProductAttachmentRepository) {
                $this->repositoryByClassName[ProductAttachment::class] = $repository;
            }
            if ($repository instanceof SeriesRepository) {
                $this->repositoryByClassName[Series::class] = $repository;
            }
        }
    }

    public function getForClassName($className)
    {
        return $this->repositoryByClassName[$className];
    }
}
