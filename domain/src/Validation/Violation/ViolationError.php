<?php

namespace AdventistCommons\Domain\Validation\Violation;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class ViolationError
{
    private $entityName;
    private $fieldName;
    private $message;
    
    public function __construct($message = 'A validation violation occured', $entityName = null, $fieldName = null)
    {
        $this->entityName = $entityName;
        $this->fieldName  = $fieldName;
        $this->message    = $message;
    }
    
    public function getEntityName()
    {
        return $this->entityName;
    }
    
    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
