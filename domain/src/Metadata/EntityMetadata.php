<?php

namespace AdventistCommons\Domain\Metadata;

use AdventistCommons\Domain\Hydrator\Preprocessor\ForeignPreprocessor;
use AdventistCommons\Domain\Validation\EntityValidator;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
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
	
	public function getFieldsForHydratorPreprocess($preprocessName)
	{
		return $this->getFieldsForPreprocessor('hydrate_preprocessor', $preprocessName);
	}
	
	public function getFieldsForStorePreprocess($preprocessName)
	{
		return $this->getFieldsForPreprocessor('store_preprocessor', $preprocessName);
	}
	
	private function getFieldsForPreprocessor($preprocessType, $preprocessName)
	{
		if (!($fields = $this->get('fields'))) {
			return [];
		}
		
		return array_filter(
			$fields,
			function (FieldMetadata $metadata) use ($preprocessType, $preprocessName) {
				if (!$metadata->has($preprocessType)) {
					return false;
				}
				$preprocess = $metadata->get($preprocessType);
				return (
					$preprocess === $preprocessName
					||
					is_array($preprocess) && in_array($preprocessName, $preprocess)
				);
			}
		);
	}
	
	public function getClassName()
	{
		return $this->className;
	}
	
	public function getForeignIdNames()
	{
		$foreignIdNames = array_keys(
			$this->getFieldsForHydratorPreprocess(ForeignPreprocessor::class)
		);
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
	
	public static function propertyToGetter(string $propertyName)
	{
		return sprintf('get%s', ucfirst(CamelCaseFormatter::run($propertyName)));
	}
	
	public static function propertyToSetter(string $propertyName)
	{
		return sprintf('set%s', ucfirst(CamelCaseFormatter::run($propertyName)));
	}
}
