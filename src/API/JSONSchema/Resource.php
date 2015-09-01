<?php
namespace LeadFerret\Lib\API\JSONSchema;

use LeadFerret\Lib\API\Serializers\BaseSerializer;


/**
 * represents the CRUD on a resource
 * the ability to figure out what you can do to this resource. 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @namespace LeadFerret\Lib\API\JSONSchema
 */
class Resource 
{
    
    /**
     * pulled in from the API 
     * every resource needs to have a serializer attached to it 
     * 
     * @var Serializer Collection  
     */
    protected $serializers = null;
    
    /**
     * can either be the ID or some other unique name 
     * @var string
     */
    protected $name = null;
    
    public function __construct($name = '', $serializers = null)
    {
        $this->name = $name;
        foreach($serializers as $serializer)
            $this->setSerializer($serializer);
    }
    
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setSerializer(BaseSerializer $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }
    
}