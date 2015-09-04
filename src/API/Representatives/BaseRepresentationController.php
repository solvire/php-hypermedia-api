<?php
namespace Solvire\API\Representatives;

/**
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package RepresentationControllers
 * @namespace Solvire\API\Representatives
 */
abstract class BaseRepresentationController 
{
    
    /**
     * 
     * @var Serializer $serializer
     */
    protected $serializer = null;
    
    /**
     * @var Renderer $renderer
     */
    protected $renderer = null;
    
    /**
     * 
     * @var Request $request
     */
    protected $request = null;
    
    /**
     * 
     * @param unknown $serializer
     * @return \Solvire\API\Representatives\RepresentationControllers
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }
    
    /**
     * 
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     *
     * @param unknown $renderer
     * @return \Solvire\API\Representatives\RepresentationControllers
     */
    public function setRenderer($renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }
    
    /**
     *
     */
    public function getRenderer()
    {
        return $this->renderer;
    }
    
    
    /**
     *
     * @param HttpRequest $request
     * @return \Solvire\API\Representatives\RepresentationControllers
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
