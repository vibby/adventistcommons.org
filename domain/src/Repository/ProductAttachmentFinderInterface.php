<?php

namespace AdventistCommons\Domain\Repository;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
interface ProductAttachmentFinderInterface
{
	/**
	 * Get structure data about the Product only
	 * @param int $product_id
	 * @return array
	 */
	public function getProductAttachmentStructure(int $product_attachment_id): array;
}
