<?php

namespace AdventistCommons\Domain\Validation\Entity;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Validation\Validator;
use AdventistCommons\Domain\Entity\ProductAttachment;

class ProductAttachmentValidator extends EntityValidator
{
    public function validate(Entity $productAttachment): void
    {
        $errors   = [];
        $errors[] = $this->getValidator(Validator\InstanceOfValidator::class)->validate($productAttachment, ProductAttachment::class);
        self::throwExceptionIfError($errors);
        
        /** @var ProductAttachment $productAttachment */
        $errors[] = $this->getValidator(Validator\NotEmptyValidator::class)->validate('Product', $productAttachment->getProduct());
        $errors[] = $this->getValidator(Validator\NotEmptyValidator::class)->validate('Language', $productAttachment->getLanguage());
        $errors[] = $this->getValidator(Validator\NotEmptyValidator::class)->validate('File type', $productAttachment->getFileType());

        self::throwExceptionIfError($errors);
    }
}
