<?php

namespace AdventistCommons\Domain\EntityMetadata;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

class EntityMetadata
{
	private $fieldsData = [];
	private $className;
	
	public function __construct(string $className, array $metadata)
	{
		$this->className = $className;
		foreach ($metadata as $field => $data) {
			$this->fieldsData[$field] = new FieldMetadata($data);
		}
	}
	
	public function getFieldsOfType($type)
	{
		$fields = $this->fieldsData;
		
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
}
