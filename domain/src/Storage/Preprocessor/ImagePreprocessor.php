<?php

namespace AdventistCommons\Domain\Storage\Preprocessor;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Metadata\EntityMetadata;
use AdventistCommons\Domain\File\File;
use Gregwar\Image\Image;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class ImagePreprocessor implements PreprocessorInterface
{
	public function preprocess(Entity $entity, EntityMetadata $entityMetadata): Entity
	{
		$fieldsMetadata = $entityMetadata->getFieldsForStorePreprocess(self::class);
		foreach ($fieldsMetadata as $fieldName => $fieldMetadata) {
			$getMethodName = $entityMetadata::propertyToGetter($fieldName);
			/** @var File $image */
			$image = $entity->$getMethodName();
			if ($image) {
				Image::open($image->getAbsolutePath())
					->useFallback(false)
					->zoomCrop(768, 768, 0, 0)
					->save($image->getAbsolutePath());
			}
		}
		
		return $entity;
	}
}
