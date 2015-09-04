<?php
namespace Solvire\API\Exceptions;

/**
 * Throws a 400
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package API
 * @namespace Solvire\API\Exceptions
 */
class InvalidParameterException extends APIException
{

    /**
     *
     * @param string $message            
     * @param \Exception $previous            
     * @param array $errors            
     */
    public function __construct($message, $previous = null, array $errors = [])
    {
        parent::__construct($message, 400, $previous, $errors);
    }
}
