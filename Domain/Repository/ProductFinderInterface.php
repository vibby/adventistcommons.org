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
	public function getProductWithAttachmentsAndProjects($product_id): array;
}
