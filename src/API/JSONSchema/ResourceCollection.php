<?php
namespace Solvire\API\JSONSchema;


use PhpCollection\Sequence;

/**
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @namespace Solvire\API\JSONSchema
 */
class ResourceCollection extends Sequence
{

    /**
     *
     * There isn't much to ordering here.
     * Just use a numeric key and we will try tro sort later
     *
     * @param array $resources
     */
    public function __construct($resources = [])
    {
        foreach ($resources as $key => $resource) {
            if (!($resource instanceof Resource)) {
                throw new \RuntimeException("Only Resource objects allowed here.");
            }
        }
        parent::__construct($resources);
    }

    /**
     *
     * @return array
     */
    public function toArray()
    {
        return $this->all();
    }

    /**
     * 
     * @param Resource $resource
     * @throws \RuntimeException
     */
    public function add($resource)
    {
        if (!($resource instanceof Resource)) {
            throw new \RuntimeException("Only Resource objects allowed here.");
        }
        return parent::add($resource);
    }
}
