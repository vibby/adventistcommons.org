<?php

namespace AdventistCommons\Domain\Validation;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\ProductAttachment;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Validation\Validator;

class ProductAttachmentValidator extends EntityValidator
{
	public static function validate(Entity $productAttachment): void
	{
		$errors = [];
		$errors[] = Validator\InstanceOfValidator::validate($productAttachment, ProductAttachment::class);
		self::throwExceptionIfError($errors);
		
		/** @var ProductAttachment $productAttachment */
		$errors[] = Validator\NotEmptyValidator::validate('Product', $productAttachment->getProduct());

		self::throwExceptionIfError($errors);
	}
}
