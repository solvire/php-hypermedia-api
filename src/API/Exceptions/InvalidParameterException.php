<?php
namespace LeadFerret\Lib\API\Exceptions;

/**
 * Throws a 400
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package API
 * @name sapce LeadFerret\Lib\API\Exceptions
 */
class InvalidParameterException extends APIException
{
    
    /**
     * 
     * @param unknown $message
     * @param string $previous
     * @param array $errors
     */
    public function __construct($message, $previous = null, array $errors = [])
    {
        parent::__construct($message, 400, $previous, $errors);
    }
    
}
