<?php

namespace AdventistCommons\Domain\Repository;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ProductFinderInterface
{
    /**
     * Get structure data about the Product, including attachments, projects, and languages of each
     *
     * @param int $productId
     * @return array
     */
    public function getProductStructureWithAttachmentsAndProjects(int $productId): array;

    /**
     * Get structure data about the Product only
     *
     * @param int $productId
     * @return array
     */
    public function getProductStructure(int $productId): array;

    /**
     * Get structure data about all Products
     *
     * @return array
     */
    public function getProductStructureAll(): array;
}
