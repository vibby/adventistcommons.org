<?php

namespace AdventistCommons\Domain\Repository;

/**
 * Interface QueryBuilderInterface
 * @package AdventistCommons\Model
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ProductFinderInterface
{
	/**
	 * Get structure data about the Product, including attachments, projects, and languages of each
	 * @param int $product_id
	 * @return array
	 */
	public function getProductStructureWithAttachmentsAndProjects(int $product_id): array;

	/**
	 * Get structure data about the Product only
	 * @param int $product_id
	 * @return array
	 */
	public function getProductStructure(int $product_id): array;

    /**
     * Get structure data about all Products
     * @param int $product_id
     * @return array
     */
    public function getProductStructureAll(): array;
}
