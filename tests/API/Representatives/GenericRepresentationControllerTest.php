<?php
namespace Solvire\Tests\API\Representatives;

use Solvire\Tests\API\Serializers\ArraySerializerConcrete;
use Solvire\Tests\API\Renderers\ListRendererConcrete;
use Solvire\API\Representatives\GenericRepresentationController;
use Illuminate\Http\Request;

/**
 * Providing some basic CRUD level stuff
 *
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
        
        
        
    }
    
    protected $availableMethods = [
        'GET',
        'POST',
        'PUT',
        'DELETE',
        'OPTIONS'
    ];

    protected $recordCount = 0;

    protected $hasMorePages = false;

    protected $isEmpty = true;

    /**
     */
    public function recordCount()
    {
        return $this->recordCount();
    }

    public function hasMorePages()
    {
        return (boolean) $this->hasMorePages;
    }

    public function process()
    {
        $method = $this->request->getMethod();
        $this->renderer->setRequest($this->request);
        $this->renderer->setSerializer($this->serializer);
        
        // check to make sure the method exists for the renderer has the method
        // for instance if it's List obj then we will have the appropriate render functions.
        // if we have a List and we call a put render
        switch ($method) {
            
            case 'GET':
                return $this->get();
                break;
            case 'POST':
                return $this->post();
                break;
            case 'PUT':
                return $this->put();
                break;
            case 'DELETE':
                return $this->delete();
                break;
            case 'OPTIONS':
                return $this->options();
                break;
            default:
                throw new \RuntimeException("No Valid Method Provided");
        }
    }
    

    public function get()
    {
        throw new \RuntimeException('Not implemented');
    }
    
    public function post()
    {
        throw new \RuntimeException('Not implemented');
    }
    
    public function put()
    {
        throw new \RuntimeException('Not implemented');
    }
    
    public function delete()
    {
        throw new \RuntimeException('Not implemented');
    }
    
    public function options()
    {
        throw new \RuntimeException('Not implemented');
    }
    
    
}
