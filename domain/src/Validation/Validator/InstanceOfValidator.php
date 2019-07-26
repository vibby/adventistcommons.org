<?php

namespace AdventistCommons\Domain\Validation\Validator;

use AdventistCommons\Domain\Validation\ValidatorInterface;
use AdventistCommons\Domain\Validation\Violation\ViolationError;

class InstanceOfValidator implements ValidatorInterface
{
    public static function validate($object, $className): ?ViolationError
    {
        if (! $object instanceof $className) {
            return new ViolationError(sprintf('Object %s expected for validation', $className));
        }
        
        return null;
    }
}
