<?php

namespace AdventistCommons\Domain\Validation;

class ValidatorCollection
{
    private $validators;
    
    public function __construct(array $validators)
    {
        foreach ($validators as $validator) {
            $this->validators[get_class($validator)] = $validator;
        }
    }
    
    public function get($validatorClass)
    {
        if (! isset($this->validators[$validatorClass])) {
            throw new \Exception(sprintf('Validator class %s is not regisrted', $validatorClass));
        }

        return $this->validators[$validatorClass];
    }
}
