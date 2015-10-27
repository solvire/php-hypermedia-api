<?php
namespace Solvire\Tests\API\Representatives;

use Solvire\Tests\API\Serializers\ArraySerializerConcrete;
use Solvire\Tests\API\Renderers\ListRendererConcrete;
use Solvire\API\Representatives\GenericRepresentationController;
use Illuminate\Http\Request;

/**
 * Providing some basic CRUD level stuff
 * 
 * @group RepresentationControllers
 * @author solvire <stevenjscott@gmail.com>
 * @package RepresentationControllers
 * @namespace namespace Solvire\API\Representatives;
 */
class GenericRepresentationControllerTest extends \BaseTestCase
{

    /**
     * 
     */
    public function testCanCreateGenericRepController()
    {
        
        $rep = new GenericRepresentationController();
        $this->assertInstanceOf('\Solvire\API\Representatives\GenericRepresentationController', $rep);
        
        
        $ser = new ArraySerializerConcrete();
        $rep->setSerializer($ser);
        $this->assertInstanceOf('\Solvire\Tests\API\Serializers\ArraySerializerConcrete', $rep->getSerializer());
        
        
        $ren = new ListRendererConcrete();
        $rep->setRenderer($ren);
        $this->assertInstanceOf('\Solvire\Tests\API\Renderers\ListRendererConcrete',$rep->getRenderer());
        
        $request = new Request();
        $request->setMethod('GET');
        $rep->setRequest($request);
        $this->assertInstanceOf('\Illuminate\Http\Request', $rep->getRequest());
        
        try {
            $rep->process();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
        // handle the posts method 
        $request->setMethod('POST');
        $rep->setRequest($request);
        try {
            $rep->process();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
        // handle the put method 
        $request->setMethod('PUT');
        $rep->setRequest($request);
        try {
            $rep->process();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
        // handle the options method
        $request->setMethod('OPTIONS');
        $rep->setRequest($request);
        try {
            $rep->process();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
        // handle the delete method
        $request->setMethod('DELETE');
        $rep->setRequest($request);
        try {
            $rep->process();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
        // handle the invalid method
        $request->setMethod('POOP');
        $rep->setRequest($request);
        try {
            $rep->process();
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
    }
    
}
