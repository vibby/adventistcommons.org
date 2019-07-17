<?php

namespace AdventistCommons\Domain\Validation;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Validation\Violation\ViolationException;
use AdventistCommons\Domain\Validation\Validator;

class ProductValidator
{
	static public function validate(Product $product): void
	{
		$errors = [];
		$errors[] = Validator\NotEmptyValidator::validate('Name', $product->getName());
		$errors[] = Validator\NotEmptyValidator::validate('page count', $product->getPageCount());
		$errors[] = Validator\InListValidator::validate('Binding', $product->getBinding(), Product::BINDINGS);
		$errors[] = Validator\InListValidator::validate('Type', $product->getType(), Product::TYPES);
		$errors[] = Validator\InListValidator::validate('Audience', $product->getAudience(), Product::AUDIENCES);
		if ($coverImage = $product->getCoverImage()) {
			$errors[] = Validator\FileImageValidator::validate('Cover image', $product->getCoverImage());
			if ($coverImage instanceof Uploaded) {
				$errors[] = Validator\UploadedFileValidator::validate('Cover image', $coverImage);
			}
		}

		$errors = array_filter($errors);
		if ($errors) {
			throw new ViolationException($errors);
		}
	}
}
