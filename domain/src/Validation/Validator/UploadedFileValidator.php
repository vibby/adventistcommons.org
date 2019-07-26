<?php

namespace AdventistCommons\Domain\Validation\Validator;

use AdventistCommons\Domain\File\Uploaded;
use AdventistCommons\Domain\Validation\ValidatorInterface;
use AdventistCommons\Domain\Validation\Violation\ViolationError;

class UploadedFileValidator implements ValidatorInterface
{
    public static function validate(string $name, Uploaded $uploadedFile): ?ViolationError
    {
        if ($errorMessage = $uploadedFile->getErrorMessage()) {
            return new ViolationError(sprintf('Field %s : %s', $name, $errorMessage));
        }
        
        return null;
    }
}
