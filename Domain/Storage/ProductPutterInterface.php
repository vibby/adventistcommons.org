<?php

namespace AdventistCommons\Domain\Storage;

interface ProductPutterInterface
{
	public function putProduct(array $productData): int;
}
