<?php
namespace Solvire\API\Representatives;

/**
 * Providing some basic CRUD level stuff
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package RepresentationControllers
 * @namespace namespace Solvire\API\Representatives;
 */
class GenericRepresentationController extends BaseRepresentationController
{

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
