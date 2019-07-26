<?php

namespace AdventistCommons\Domain\Validation\Validator;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Validation\ValidatorInterface;
use AdventistCommons\Domain\Validation\Violation\ViolationError;

class FileImageValidator implements ValidatorInterface
{
    public static function validate(string $name, File $uploadedFile): ?ViolationError
    {
        if (! $uploadedFile->isInGroup('image')) {
            return new ViolationError(sprintf(
                'File field %s must be a valid image. Given mime type is %s',
                $name,
                $uploadedFile->getMimeType()
            ));
        }
        
        return null;
    }
}
