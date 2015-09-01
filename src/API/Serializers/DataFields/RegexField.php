<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 * hmm how to regex a regex 
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class RegexField extends DataField
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