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
     *
     * There isn't much to ordering here.
     * Just use a numeric key and we will try tro sort later
     *
     * @param
     *            array of parameters $sequence
     */
    public function __construct($resources = [])
    {
        foreach ($resources as $key => $resource) {
            if (!($resource instanceof Solvire\JSONSchema\Resource)) {
                throw new Exceptions\InvalidParameterException("Only search paramater objects allowed here.");
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

    public function add($resource)
    {
        if (!($resource instanceof Solvire\JSONSchema\Resource)) {
            throw new Exceptions\InvalidParameterException("Only search paramater objects allowed here.");
        }
        return parent::add($resource);
    }
}
