<?php

namespace AdventistCommons\Domain\EntityMetadata;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

class EntityMetadata
{
	private $metadata = [];
	private $className;
	
	public function __construct(string $className, array $metadata)
	{
		$this->className = $className;
		array_walk(
			$metadata['fields'],
			function (&$data) {
				$data = new FieldMetadata($data);
			}
		);
		
		$this->metadata = $metadata;
	}
	
	public function getFieldsOfType($type)
	{
		$fields = $this->get('fields');
		return array_filter(
			$fields,
			function (FieldMetadata $metadata) use ($type) {
				return ($metadata->get('type') === $type);
			}
		);
	}
	
	public function getClassName()
	{
		return $this->className;
	}
	
	public function getForeingIdNames()
	{
		$foreignIdNames = array_keys($this->getFieldsOfType('foreign'));
		array_walk(
			$foreignIdNames,
			function (&$fieldName) {
				$fieldName = sprintf('%s_id', $fieldName);
			}
		);
		
		return $foreignIdNames;
	}
	
	public function get($key)
	{
		return $this->metadata[$key];
	}
}
