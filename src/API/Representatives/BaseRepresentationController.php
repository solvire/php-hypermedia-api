<?php
namespace Solvire\API\Representatives;

use Solvire\API\Serializers\BaseSerializer;
use Solvire\API\Renderers\BaseRenderer;

/**
 *
 * @author solvire <info@scotttactical.com>
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
     *
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
     * @param BaseSerializer $serializer            
     * @return \Solvire\API\Representatives\BaseRepresentationController
     */
    public function setSerializer(BaseSerializer $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     *
     * @param BaseRenderer $renderer            
     * @return \Solvire\API\Representatives\BaseRepresentationController
     */
    public function setRenderer(BaseRenderer $renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }

    /**
     */
    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     *
     * @param mixed $request            
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
