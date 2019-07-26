<?php

namespace AdventistCommons\Domain\Validation\Validator;

use AdventistCommons\Domain\Validation\ValidatorInterface;
use AdventistCommons\Domain\Validation\Violation\ViolationError;

class NotEmptyValidator implements ValidatorInterface
{
    public static function validate(string $name, $data): ?ViolationError
    {
        if (is_string($data)) {
            $data = trim($data);
        }
        if (! $data) {
            return new ViolationError(sprintf('Field %s cannot be empty', $name));
        }
        
        return null;
    }
}
