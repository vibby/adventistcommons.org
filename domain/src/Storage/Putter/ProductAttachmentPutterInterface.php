<?php

namespace AdventistCommons\Domain\Storage\Putter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface ProductAttachmentPutterInterface
{
	public function putProductAttachmentAndGetId(array $entityData): int;
}
