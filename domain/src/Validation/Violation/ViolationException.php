<?php

namespace AdventistCommons\Domain\Validation\Violation;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ViolationException extends \LogicException
{
    private $errors;
    
    public function __construct(array $errors, $message = 'Validation violation(s) occured', $code = 0, Throwable $previous = null)
    {
        $this->errors = $errors;
        
        parent::__construct($message, $code, $previous);
    }
    
    public function getErrors(): array
    {
        return $this->errors;
    }
}
