<?php

namespace AdventistCommons\Domain\EntityHydrator\Preprocessor;

use AdventistCommons\Domain\EntityMetadata\EntityMetadata;

interface PreprocessorInterface
{
	public function preprocess(array $entityData, EntityMetadata $metaData): array;
}
