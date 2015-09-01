<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

/**
 * not sure how to use this yet.
 *
 * needs some updating.
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class UUIDField extends DataField
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