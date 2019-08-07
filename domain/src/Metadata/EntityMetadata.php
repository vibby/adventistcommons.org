<?php

namespace AdventistCommons\Domain\Metadata;

use AdventistCommons\Domain\Entity\Entity;
use Kolyunya\StringProcessor\Format\CamelCaseFormatter;
use Kolyunya\StringProcessor\Format\SnakeCaseFormatter;
use AdventistCommons\Domain\Validation\Entity\EntityValidator;
use AdventistCommons\Domain\Hydrator\Normalizer\ForeignNormalizer;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class EntityMetadata
{
    private $metadata = [];
    private $className;
    
    public function __construct(string $className, array $metadata)
    {
        $reflection = new \ReflectionClass($className);
        $fieldNames = [];
        foreach ($reflection->getMethods() as $method) {
            if (substr($method->getName(), 0, 3) === 'set') {
                $fieldNames[] = $this->snakeCase(substr($method->getName(), 3));
            }
        }
        $fields             = array_fill_keys($fieldNames, []);
        $metadata['fields'] = array_merge($fields, $metadata['fields'] ?? []);
        array_walk(
            $metadata['fields'],
            function (&$data, $fieldName) {
                $data = new FieldMetadata($fieldName, $data, $this);
            }
        );
                
        $this->metadata  = $metadata;
        $this->className = $className;
    }
    
    public function getFieldsForHydratorNormalizer($normalizerName)
    {
        return $this->getFieldsWithProperty('hydrate_normalizer', $normalizerName);
    }
    
    public function getFieldsForProcessor(string $processorName, string $action)
    {
        return $this->getFieldsWithProperty($action, $processorName);
    }
    
    private function getFieldsWithProperty($property, $value)
    {
        return $this->filterFields(
            function (FieldMetadata $metadata) use ($property, $value) {
                if (! $metadata->has($property)) {
                    return false;
                }
                $thisValue = $metadata->get($property);

                return (
                    $thisValue === $value
                    ||
                    is_array($thisValue) && in_array($value, $thisValue)
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
        $foreignIdNames = $this->getFieldsForHydratorNormalizer(ForeignNormalizer::class);
        array_walk(
            $foreignIdNames,
            function (FieldMetadata &$fieldName) {
                $fieldName = $fieldName->formatToId();
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
        if (! is_subclass_of($className, EntityValidator::class)) {
            throw new \Exception(sprintf(
                'Class given as validator for entity %s is not an entity validator, %s given',
                $this->getClassName(),
                $className
            ));
        }
        
        return $className;
    }
    
    /**
     * @param string $string
     * @return string
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public static function camelCase(string $string): string
    {
        return CamelCaseFormatter::run($string);
    }
    
    /**
     * @param string $string
     * @return string
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public static function snakeCase(string $string): string
    {
        return SnakeCaseFormatter::run($string);
    }
    
    public function propertyToGetter(string $propertyName)
    {
        return sprintf('get%s', ucfirst($this->camelCase($propertyName)));
    }
    
    public function propertyToSetter(string $propertyName)
    {
        return sprintf('set%s', ucfirst($this->camelCase($propertyName)));
    }
    
    public function propertyToAdder(string $propertyName)
    {
        return sprintf('add%s', ucfirst($this->camelCase($propertyName)));
    }
    
    public function extractShortClassName(Entity $entity = null)
    {
        $path = explode('\\', $entity ? get_class($entity) : $this->className);
        
        return array_pop($path);
    }
        
    public function getFieldsToStore()
    {
        return $this->get('fields');
    }
    
    private function filterFields(\closure $closure)
    {
        if (! ($fields = $this->get('fields'))) {
            return [];
        }
        
        return array_filter($fields, $closure);
    }
    
    public function getSetMethodName()
    {
        return sprintf('set%s', $this->extractShortClassName());
    }
    
    public function getRemoveMethodName()
    {
        return sprintf('remove%s', $this->extractShortClassName());
    }
    
    public function getPutMethodName()
    {
        return sprintf('put%sAndGetId', $this->extractShortClassName());
    }
}
