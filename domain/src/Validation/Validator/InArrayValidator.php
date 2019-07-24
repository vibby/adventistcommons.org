<?php

namespace AdventistCommons\Domain\Validation\Validator;

use AdventistCommons\Domain\Validation\Violation\ViolationError;

class InArrayValidator
{
    public static function validate(string $name, $data, array $list): ?ViolationError
    {
        if (! in_array($data, $list)) {
            return new ViolationError(sprintf('Field %s cannot take the value «%s»', $name, $data));
        }
        
        return null;
    }
}
