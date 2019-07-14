<?php

namespace AdventistCommons\Domain\Storage;

interface ProductPutterInterface
{
	public function putProductAndGetId(array $productData): int;
}
