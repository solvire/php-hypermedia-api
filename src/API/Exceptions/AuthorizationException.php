<?php
namespace Solvire\API\Exceptions;

/**
 * Throws a 403
 * you are not permitted to do this.
 *
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package API
 * @namespace Solvire\API\Exceptions
 */
class AuthorizationException extends APIException
{

    /**
     *
     * @param string $message            
     * @param \Exception $previous            
     * @param array $errors            
     */
    public function __construct($message, $previous = null, array $errors = [])
    {
        parent::__construct($message, 403, $previous, $errors);
    }
}
