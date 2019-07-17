<?php

namespace AdventistCommons\Domain\EntityMetadata;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

class FieldMetadata
{
	private $metadata;
	
	public function __construct(array $metadata)
	{
		/** @TODO : validate metadata (fields, consistence, etc) */
		$this->metadata = $metadata;
	}
	
	public function get($dataName)
	{
		return $this->metadata[$dataName];
	}
}
