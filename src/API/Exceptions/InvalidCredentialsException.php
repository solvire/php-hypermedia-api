<?php
namespace Solvire\API\Exceptions;

/**
 * Throws a 401
 *
 * @author solvire <info@scotttactical.com>
 * @package API
 * @namespace Solvire\API\Exceptions
 */
class InvalidCredentialsException extends APIException
{

    /**
     *
     * @param string $message            
     * @param \Exception $previous            
     * @param array $errors            
     */
    public function __construct($message, $previous = null, array $errors = [])
    {
        parent::__construct($message, 401, $previous, $errors);
    }
}
