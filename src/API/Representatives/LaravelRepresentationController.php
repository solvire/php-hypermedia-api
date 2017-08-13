<?php
namespace Solvire\API\Representatives;

use Illuminate\Database\Eloquent\Model;

/**
 * Providing some basic CRUD level stuff
 *
 * @author solvire <info@scotttactical.com>
 * @package RepresentationControllers
 * @namespace Solvire\API\Representatives
 */
class LaravelRepresentationController extends GenericRepresentationController
{

    protected $model = null;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    
    public function setModel(Model $model)
    {
        $this->model = $model;
        return $this;
    }
    
    public function getModel()
    {
        return $this->model;
    }

    /**
     * HTTP/1.1 200 OK
     * {
     * "href" : "https://api.mycompany.com/v1/users?offset=50&amp;limit=50"
     * "offset": 50,
     * "limit": 50,
     * “first”: {
     * “href”: "https://api.mycompany.com/v1/users"
     * },
     * “prev”: {
     * “href”: "https://api.mycompany.com/v1/users"
     * },
     * “next”: {
     * “href”: "https://api.mycompany.com/v1/users?offset=100&amp;limit=50"
     * },
     * “last”: {
     * “href”: "https://api.mycompany.com/v1/users?offset=50&amp;limit=50"
     * },
     * "items": [
     * {
     * ... user 51 name/value pairs ...
     * },
     * ...,
     * {
     * ... user 100 name/value pairs ...
     * }
     * }
     * }
     */
    public function getGenericContext()
    {
        // lets put together the data for render
        throw new \RuntimeException("Not implemented");
    }
}
