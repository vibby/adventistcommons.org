<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\Xliff\XliffParser;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class XliffNormalizer implements NormalizerInterface, HydratorAwareInterface
{
	private $xliffParser;
	private $hydrator;
	
	public function __construct(XliffParser $xliffParser)
	{
		$this->xliffParser = $xliffParser;
	}
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function normalize(iterable $entityData, EntityMetadata $entityMetadata): iterable
	{
		/**
		 * @var string $fieldName
		 * @var FieldMetadata $fieldMetadata
		 */
		foreach ($entityMetadata->getFieldsForHydratorNormalizer(self::class) as $fieldName => $fieldMetadata) {
			if (isset($entityData[$fieldName]) && ($entityData[$fieldName] instanceof Uploaded)) {
				$this->xliffParser->setHydrator($this->hydrator);
				$entityData['section'] = $this->xliffParser->parseFile($entityData[$fieldName]);
			}
		}
		
		return $entityData;
	}
}
