<?php

namespace AdventistCommons\Domain\Validation\Validator;

use AdventistCommons\Domain\Validation\Violation\ViolationError;

class NotEmptyValidator
{
	static public function validate(string $name, $data): ?ViolationError
	{
		if (!trim($data)) {
			return new ViolationError(sprintf('Field %s cannot be empty', $name));
		}
		
		return null;
	}
}
