<?php
namespace Solvire\API\JSONSchema;

use Solvire\API\Serializers\BaseSerializer;

/**
 * represents the CRUD on a resource
 * the ability to figure out what you can do to this resource.
 *
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @namespace Solvire\API\JSONSchema
 */
class Resource
{

    /**
     *
     * @var string
     */
    protected $name = null;

    /**
     * pulled in from the API
     * every resource needs to have a serializer attached to it
     *
     * @var BaseSerializer
     */
    protected $serializer = null;

    /**
     * can either be the ID or some other unique name
     * 
     * @var string
     */
    protected $name = null;

    /**
     *
     * @param string $name            
     * @param BaseSerializer $serializers            
     */
    public function __construct($name = '', $serializer = null)
    {
        $this->name = $name;
        $this->setSerializer($serializer);
    }

    /**
     *
     * @param string $name            
     * @return \Solvire\API\JSONSchema\Resource
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return string
     */
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