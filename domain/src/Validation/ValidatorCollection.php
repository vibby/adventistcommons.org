<?php

namespace AdventistCommons\Domain\Validation;

use PhpSpec\Exception\Exception;

class ValidatorCollection
{
    private $validators;
    
    public function __construct(array $validators)
    {
        foreach ($validators as $validator) {
            if (! $validator instanceof ValidatorInterface) {
                throw new Exception('Cannot collect non validator objects as validators !');
            }
            $this->validators[get_class($validator)] = $validator;
        }
    }
    
    public function get($validatorClass)
    {
        if (! isset($this->validators[$validatorClass])) {
            throw new \Exception(sprintf('Validator class %s is not registered', $validatorClass));
        }
        
        $validator = $this->validators[$validatorClass];
        if ($validator instanceof ValidatorCollectionAwareInterface) {
            $validator->setValidatorCollection($this);
        }
        
        return $validator;
    }
}
