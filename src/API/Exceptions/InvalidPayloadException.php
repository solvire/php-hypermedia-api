<?php
namespace LeadFerret\Lib\API\Exceptions;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package API
 * @name sapce LeadFerret\Lib\API\Exceptions
 * 
 * http://tools.ietf.org/html/rfc4918#section-11.2
 */
class InvalidPayloadException extends APIException
{
    
    /**
     * 
     * @param unknown $message
     * @param string $previous
     * @param array $errors
     */
    public function __construct($message = 'Unprocessable Entity', $previous = null, array $errors = [])
    {
        parent::__construct($message, 422, $previous, $errors);
    }
    
}
