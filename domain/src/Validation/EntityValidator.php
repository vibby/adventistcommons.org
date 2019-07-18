<?php

namespace AdventistCommons\Domain\Validation;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Validation\Violation\ViolationException;

abstract class EntityValidator
{
	public abstract static function validate(Entity $entity): void;
	
	protected static function throwExceptionIfError(array $errors)
	{
		$errors = array_filter($errors);
		if ($errors) {
			throw new ViolationException($errors);
		}
	}
}
