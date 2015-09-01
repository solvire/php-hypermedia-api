<?php
namespace LeadFerret\Lib\API\JSONSchema;

use LF\Utility\OptionsChecker as Ch;
use LF\Utility\Environment as Ev;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @name sapce LeadFerret\Lib\API\JSONSchema
 */
class JSONSchemaAppliance implements Schemable
{

    protected $base = null;
    
    /**
     * @var ResourceCollection 
     */
    protected $resources = null;

    public function __construct()
    {
        $this->constructBase();
        $this->resources = new ResourceCollection();
    }
    
    /**
     * 
     * @param \LeadFerret\Lib\API\JSONSchema\Resource $resource
     * @return \LeadFerret\Lib\API\JSONSchema\JSONSchemaAppliance
     */
    public function registerResource(Resource $resource)
    {
        if($this->resources == null)
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
        $this->base->setDocumentationUrl(isset($options['basePath']) ? $options['basePath'] : Ev::get('API_DOCUMENTATION_URL'));
        $this->base->setName(isset($options['applicationName']) ? $options['applicationName'] : Ev::get('APPLICATION_NAME'));
        $this->base->setId(isset($options['id']) ? $options['id'] : Ev::get('APPLICATION_NAME') . ":" . Ev::get('API_VERSION'));
        $this->base->setVersion(isset($options['version']) ? $options['version'] : Ev::get('API_VERSION'));
        $this->base->setDescription(isset($options['description']) ? $options['description'] : Ev::get('API_DESCRIPTION'));
        
    }
    
    public function setAuthScopes($auths)
    {
        // these should be Auth collection 
        foreach($auths as $auth)
        {
            if(!($auth instanceOf Auth))
                throw new \Exception("bad auth object");
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \LeadFerret\Lib\API\JSONSchema\Schemable::allSet()
     */
    public function allSet()
    {
       if($this->base->allSet())
           return true; 
    }
    
    public function toSchema()
    {
        if($this->allSet())
        {
            $schema = $this->base->toSchema();
//             ksort($schema);
            return $schema;
        }
    }
}
