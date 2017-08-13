<?php
namespace Solvire\API\Exceptions;

/**
 * APIException
 * Base class for the API exceptions
 *
 * TODO need to combined this with the API excpeption - duplicate
 *
 *
 * @author solvire <info@scotttactical.com>
 * @package API
 * @namespace Solvire\API\Exceptions
 */
abstract class APIException extends \RuntimeException
{

    private $statusCode;

    private $headers;

    private $errors;

    /**
     *
     * @param string $message            
     * @param integer $statusCode            
     * @param \Exception $previous            
     * @param array $errors            
     * @param array $headers            
     */
    public function __construct($message, $statusCode = 0, \Exception $previous = null, array $errors = [], array $headers = [])
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->errors = $errors;
        
        parent::__construct($message, $statusCode, $previous);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setStatusCode($val)
    {
        $this->statusCode = $val;
        return $this;
    }

    public function setHeaders($val)
    {
        $this->headers = $val;
        return $this;
    }

    public function setErrors($val)
    {
        $this->errors = $val;
        return $this;
    }
}
