<?php
namespace Solvire\Tests\API\Exceptions;

use Solvire\API\Exceptions\InvalidParameterException;
use Solvire\API\Exceptions\ConditionalFailureException;
use Solvire\API\Exceptions\AuthorizationException;
use Solvire\API\Exceptions\InvalidCredentialsException;
use Solvire\API\Exceptions\InvalidPayloadException;


/**
 * APIException
 * Base class for the API exceptions
 *
 * TODO need to combined this with the API excpeption - duplicate
 *
 * @group Exceptions
 * @author solvire <info@scotttactical.com>
 * @package API
 * @namespace Solvire\API\Exceptions
 */
class APIExceptionTest extends \BaseTestCase
{
    
    public function testCanCreateInvalidParameterException()
    {
        $errors = ['id'=>'blank'];
        
        $e = new InvalidParameterException("TESTING",null,$errors);
        $this->assertEquals(400,$e->getStatusCode());
        $this->assertEquals('TESTING',$e->getMessage());
        $this->assertEquals([],$e->getHeaders());
        $this->assertEquals($errors,$e->getErrors());
        
    }
    
    public function testCanCreateConditionalFailureExceptionException()
    {
        $errors = ['id'=>'blank'];
        $headers = ['accept' => 'spaghetti'];
    
        $e = new ConditionalFailureException("TESTING");
        $e->setStatusCode(401);
        $e->setHeaders($headers);
        $e->setErrors($errors);
        
        
        $this->assertEquals(401,$e->getStatusCode());
        $this->assertEquals('TESTING',$e->getMessage());
        $this->assertEquals($headers,$e->getHeaders());
        $this->assertEquals($errors,$e->getErrors());
    
    }
    
    public function testCanCreateAuthorizationException()
    {
        $e = new AuthorizationException("TESTING");
        $this->assertEquals(403,$e->getStatusCode());
    }
    
    public function testCanCreateInvalidPayloadException()
    {
        $e = new InvalidPayloadException("TESTING");
        $this->assertEquals(422,$e->getStatusCode());
    }
    
    public function testCanCreateInvalidCredentialsException()
    {
        $e = new InvalidCredentialsException("TESTING");
        $this->assertEquals(401,$e->getStatusCode());
    }

}
