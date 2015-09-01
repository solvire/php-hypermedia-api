<?php
namespace LeadFerret\Lib\API\Renderers;

use LeadFerret\Lib\API\Serializers\BaseSerializer;
/**
 * Base of the Renderer classes 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Renderers
 * @namespace LeadFerret\Lib\API\Renderers
 */
abstract class BaseRenderer
{
    
    /**
     * 
     * @var Serializer $serializer
     */
    protected $serializer = null;
    
    
    protected $request =null;

    /**
     * 
     * @param BaseSerializer $serializer
     * @return \LeadFerret\Lib\API\Serializers\BaseSerializer
     */
    public function setSerializer(BaseSerializer $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }
    
    /**
     *
     * @param HttpRequest $request
     * @return \LeadFerret\Lib\API\Representatives\RepresentationControllers
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }
    
    /**
     *
     */
    public function getRequest()
    {
        return $this->request;
    }
    
       
    
    
}