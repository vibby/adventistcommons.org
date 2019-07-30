<?php

namespace AdventistCommons\Domain\Validation\Entity;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Validation\ValidatorInterface;
use AdventistCommons\Domain\Validation\ValidatorCollection;
use AdventistCommons\Domain\Validation\Violation\ViolationException;
use AdventistCommons\Domain\Validation\ValidatorCollectionAwareInterface;

abstract class EntityValidator implements ValidatorInterface, ValidatorCollectionAwareInterface
{
    /** @var ValidatorCollection */
    protected $validatorCollection;
    
    public function setValidatorCollection(ValidatorCollection $validatorCollection)
    {
        $this->validatorCollection = $validatorCollection;
    }
    
    public function getValidator($validatorClassName): ValidatorInterface
    {
        if (! $this->validatorCollection) {
            throw new \Exception('Validator collection must be set to entity validator.');
        }

        return $this->validatorCollection->get($validatorClassName);
    }
    
    abstract public function validate(Entity $entity): void;
    
    protected static function throwExceptionIfError(array $errors)
    {
        $errors = array_filter($errors);
        if ($errors) {
            throw new ViolationException($errors);
        }
    }
}
