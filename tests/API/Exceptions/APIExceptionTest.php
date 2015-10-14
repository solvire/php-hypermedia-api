<?php
namespace Solvire\Tests\API\Exceptions;

use Solvire\API\Exceptions\InvalidParameterException;
use Solvire\API\Exceptions\ConditionalFailureException;


/**
 * APIException
 * Base class for the API exceptions
 *
 * TODO need to combined this with the API excpeption - duplicate
 *
 * @group Exceptions
 * @author solvire <stevenjscott@gmail.com>
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

}
