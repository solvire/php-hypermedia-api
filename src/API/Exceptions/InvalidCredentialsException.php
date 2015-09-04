<?php
namespace Solvire\API\Exceptions;

/**
 * Throws a 401
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package API
 * @name sapce Solvire\API\Exceptions
 */
class InvalidCredentialsException extends APIException
{
    
    /**
     * 
     * @param unknown $message
     * @param string $previous
     * @param array $errors
     */
    public function __construct($message, $previous = null, array $errors = [])
    {
        parent::__construct($message, 401, $previous, $errors);
    }
    
}
