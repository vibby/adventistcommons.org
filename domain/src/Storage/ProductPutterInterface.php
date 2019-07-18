<?php

namespace AdventistCommons\Domain\Storage;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface ProductPutterInterface
{
	public function putProductAndGetId(array $productData): int;
}
