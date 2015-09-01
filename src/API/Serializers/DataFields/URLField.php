<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

use Respect\Validation\Validator as v;

/**
 * TODO need to find a library that handles url parsing well
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class URLField extends DataField
{
    
    protected $cast = 'string';
    
    /**
     * (non-PHPdoc)
     * @see \LeadFerret\Lib\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        if(!is_string($data) || !v::url()->validate($data) )
            throw new \RuntimeException('URLField data must be a string representation of a URL ' . $data);
        
        $this->data = $data;
        return $this;
    }
    
    /**
     * This is a char so it will always be just a string
     */
    public function getData()
    {
        return (string) $this->data;
    }
    
}
