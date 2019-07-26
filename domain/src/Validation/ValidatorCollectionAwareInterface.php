<?php

namespace AdventistCommons\Domain\Validation;

interface ValidatorCollectionAwareInterface
{
    public function setValidatorCollection(ValidatorCollection $validatorCollection);
}
