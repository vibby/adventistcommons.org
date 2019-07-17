<?php

namespace AdventistCommons\Domain\EntityHydrator;

use AdventistCommons\Domain\EntityMetadata\EntityMetadata;
use AdventistCommons\Domain\EntityMetadata\FieldMetadata;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\File\FileSystem;

class FileHydrator
{
	const TYPE = 'file';
	
	private $fileSystem;
	
	public function __construct(FileSystem $fileSystem)
	{
		$this->fileSystem = $fileSystem;
	}
	
	public function buildFiles(array $productData, EntityMetadata $metaData)
	{
		/**
		 * @var string $fileField
		 * @var FieldMetadata $metadata
		 */
		foreach ($metaData->getFieldsOfType(self::TYPE) as $fileField => $metadata) {
			if (isset($productData[$fileField])) {
				if ($productData[$fileField] && is_string($productData[$fileField])) {
					$basePath = $this->fileSystem->getRootPath($metadata->get('root_path_group'));
					$productData[$fileField] = new File($basePath, $productData[$fileField]);
				} elseif (!$productData[$fileField] instanceof File) {
					$productData[$fileField] = null;
				}
			}
		}
		
		return $productData;
	}
}
