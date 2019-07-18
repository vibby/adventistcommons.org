<?php

namespace AdventistCommons\Domain\EntityMetadata;

use AdventistCommons\Domain\Validation\EntityValidator;

class EntityMetadata
{
	private $metadata = [];
	private $className;
	
	public function __construct(string $className, array $metadata)
	{
		$this->className = $className;
		if (isset($metadata['fields'])) {
			array_walk(
				$metadata['fields'],
				function (&$data) {
					$data = new FieldMetadata($data);
				}
			);
		}
		
		$this->metadata = $metadata;
	}
	
	public function getFieldsOfType($type)
	{
		if (!($fields = $this->get('fields'))) {
			return [];
		}
		
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
	
	public function getForeignIdNames()
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
		return $this->metadata[$key] ?? null;
	}
	
	public function getValidator()
	{
		$className = $this->get('validator_class');
		if (!is_subclass_of($className, EntityValidator::class)) {
			throw new \Exception(sprintf(
				'Class given as validator for entity %s is not an entity validator, %s given',
				$this->getClassName(),
				$className
			));
		}
		
		return $className;
	}
}
