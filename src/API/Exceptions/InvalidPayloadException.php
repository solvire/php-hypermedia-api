<?php
namespace Solvire\API\Exceptions;

/**
 *
 * @author solvire <info@scotttactical.com>
 * @package API
 * @namespace Solvire\API\Exceptions
 * @see http://tools.ietf.org/html/rfc4918#section-11.2
 */
class InvalidPayloadException extends APIException
{

    /**
     *
     * @param string $message            
     * @param \Exception $previous            
     * @param array $errors            
     */
    public function __construct($message = 'Unprocessable Entity', $previous = null, array $errors = [])
    {
        parent::__construct($message, 422, $previous, $errors);
    }
}
