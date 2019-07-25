<?php

namespace AdventistCommons\Domain\Validation\Entity;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Validation\Validator;

class ProductValidator extends EntityValidator
{
    public function validate(Entity $product): void
    {
        $errors   = [];
        $errors[] = $this->getValidator(Validator\InstanceOfValidator::class)->validate($product, Product::class);
        self::throwExceptionIfError($errors);
        
        /** @var Product $product */
        $errors[] = $this->getValidator(Validator\NotEmptyValidator::class)->validate('Name', $product->getName());
        $errors[] = $this->getValidator(Validator\NotEmptyValidator::class)->validate('page count', $product->getPageCount());
        $errors[] = $this->getValidator(Validator\InArrayValidator::class)->validate('Binding', $product->getBinding(), Product::BINDINGS);
        $errors[] = $this->getValidator(Validator\InArrayValidator::class)->validate('Type', $product->getType(), Product::TYPES);
        $errors[] = $this->getValidator(Validator\InArrayValidator::class)->validate('Audience', $product->getAudience(), Product::AUDIENCES);
        if ($coverImage = $product->getCoverImage()) {
            $errors[] = $this->getValidator(Validator\FileImageValidator::class)->validate('Cover image', $product->getCoverImage());
            if ($coverImage instanceof Uploaded) {
                $errors[] = $this->getValidator(Validator\UploadedFileValidator::class)->validate('Cover image', $coverImage);
            }
        }
        self::throwExceptionIfError($errors);
    }
}
