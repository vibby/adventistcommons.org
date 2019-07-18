<?php

namespace AdventistCommons\Domain\Hydrator\Preprocessor;

use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\Metadata\FieldMetadata;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class FilePreprocessor implements PreprocessorInterface
{
	private $fileSystem;
	
	public function __construct(FileSystem $fileSystem)
	{
		$this->fileSystem = $fileSystem;
	}
	
	public function preprocess(array $productData, EntityMetadata $entityMetadata): array
	{
		/**
		 * @var string $fieldName
		 * @var FieldMetadata $fieldMetadata
		 */
		foreach ($entityMetadata->getFieldsForHydratorPreprocess(self::class) as $fieldName => $fieldMetadata) {
			if (isset($productData[$fieldName])) {
				if ($productData[$fieldName] && is_string($productData[$fieldName])) {
					$basePath = $this->fileSystem->getRootPath($fieldMetadata->get('root_path_group'));
					$productData[$fieldName] = new File($basePath, $productData[$fieldName]);
				} elseif (!$productData[$fieldName] instanceof File) {
					$productData[$fieldName] = null;
				}
			}
		}
		
		return $productData;
	}
}
