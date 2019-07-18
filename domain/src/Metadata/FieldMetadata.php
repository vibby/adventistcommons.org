<?php

namespace AdventistCommons\Domain\Metadata;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
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
	
	public function has($dataName)
	{
		return isset($this->metadata[$dataName]);
	}
}
