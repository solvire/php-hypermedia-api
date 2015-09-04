<?php
namespace Solvire\API\Exceptions;

/**
 * Throws a 403
 * you are not permitted to do this. 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package API
 * @name sapce Solvire\API\Exceptions
 */
class AuthorizationException extends APIException
{
    
    /**
     * 
     * @param unknown $message
     * @param string $previous
     * @param array $errors
     */
    public function __construct($message, $previous = null, array $errors = [])
    {
        parent::__construct($message, 403, $previous, $errors);
    }
    
}
