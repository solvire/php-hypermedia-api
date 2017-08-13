<?php
namespace Solvire\API\Renderers;

use Solvire\API\Serializers\BaseSerializer;

/**
 * Base of the Renderer classes
 *
 * @author solvire <info@scotttactical.com>
 * @package Renderers
 * @namespace Solvire\API\Renderers
 */
abstract class BaseRenderer
{

    /**
     *
     * @var Serializer $serializer
     */
    protected $serializer = null;

    protected $request = null;

    /**
     *
     * @param BaseSerializer $serializer            
     * @return \Solvire\API\Renderers\BaseRenderer
     */
    public function setSerializer(BaseSerializer $serializer)
    {
        $this->serializer = $serializer;
        return $this;
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
     */
    public function getRequest()
    {
        return $this->request;
    }
}