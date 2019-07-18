<?php

namespace AdventistCommons\Domain\Hydrator\Preprocessor;

use AdventistCommons\Domain\Metadata\EntityMetadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface PreprocessorInterface
{
	public function preprocess(array $entityData, EntityMetadata $metaData): array;
}
