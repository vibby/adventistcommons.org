<?php

namespace AdventistCommons\Domain\Validation;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Validation\Validator;

class ProductValidator extends EntityValidator
{
    public static function validate(Entity $product): void
    {
        $errors = [];
        $errors[] = Validator\InstanceOfValidator::validate($product, Product::class);
        self::throwExceptionIfError($errors);
        
        /** @var Product $product */
        $errors[] = Validator\NotEmptyValidator::validate('Name', $product->getName());
        $errors[] = Validator\NotEmptyValidator::validate('page count', $product->getPageCount());
        $errors[] = Validator\InArrayValidator::validate('Binding', $product->getBinding(), Product::BINDINGS);
        $errors[] = Validator\InArrayValidator::validate('Type', $product->getType(), Product::TYPES);
        $errors[] = Validator\InArrayValidator::validate('Audience', $product->getAudience(), Product::AUDIENCES);
        if ($coverImage = $product->getCoverImage()) {
            $errors[] = Validator\FileImageValidator::validate('Cover image', $product->getCoverImage());
            if ($coverImage instanceof Uploaded) {
                $errors[] = Validator\UploadedFileValidator::validate('Cover image', $coverImage);
            }
        }
        self::throwExceptionIfError($errors);
    }
}
