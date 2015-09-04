<?php
namespace Solvire\API\Serializers\DataFields;


/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class ImageField extends DataField
{
    public function setData($data)
    {
        throw new \RuntimeException('not implemented');
    }
    
    /**
     * This is a char so it will always be just a string
     */
    public function getData()
    {
        throw new \RuntimeException('not implemented');
    }
    
}