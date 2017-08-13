<?php
namespace Solvire\API\JSONSchema;

use Solvire\Utilities\OptionsChecker as Ch;
use Solvire\Application\Environment as Ev;

/**
 *
 * @author solvire <info@scotttactical.com>
 * @package JSONSchema
 * @namespace Solvire\API\JSONSchema
 */
class JSONSchemaAppliance implements Schemable
{

    protected $base = null;

    /**
     *
     * @var ResourceCollection
     */
    protected $resources = null;

    public function __construct($baseOptions = null)
    {
        $this->constructBase($baseOptions);
        $this->resources = new ResourceCollection();
    }

    /**
     *
     * @param \Solvire\API\JSONSchema\Resource $resource            
     * @return \Solvire\API\JSONSchema\JSONSchemaAppliance
     */
    public function registerResource(Resource $resource)
    {
        if ($this->resources == null)
            $this->resources = new ResourceCollection();
        
        $this->resources->add($resource);
        return $this;
    }

    /**
     *
     * @param array $options            
     */
    public function constructBase(array $options = null)
    {
        if (! isset($this->base))
            $this->base = new Base();
        
        $this->base->setBaseUrl(isset($options['baseUrl']) ? $options['baseUrl'] : Ev::get('API_BASE_URL'));
        $this->base->setBasePath(isset($options['basePath']) ? $options['basePath'] : Ev::get('API_BASE_PATH'));
        $this->base->setDocumentationUrl(isset($options['documentationUrl']) ? $options['documentationUrl'] : Ev::get('API_DOCUMENTATION_URL'));
        $this->base->setName(isset($options['applicationName']) ? $options['applicationName'] : Ev::get('APPLICATION_NAME'));
        $this->base->setId(isset($options['id']) ? $options['id'] : Ev::get('APPLICATION_NAME') . ":" . Ev::get('API_VERSION'));
        $this->base->setVersion(isset($options['version']) ? $options['version'] : Ev::get('API_VERSION'));
        $this->base->setDescription(isset($options['description']) ? $options['description'] : Ev::get('API_DESCRIPTION'));
    }

    public function setAuthScopes($auths)
    {
        // these should be Auth collection
        foreach ($auths as $auth) {
            if (! ($auth instanceof Auth))
                throw new \Exception("bad auth object");
        }
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\JSONSchema\Schemable::allSet()
     */
    public function allSet()
    {
        return $this->base->allSet();
    }

    public function toSchema()
    {
        return $this->base->toSchema();
    }
}
