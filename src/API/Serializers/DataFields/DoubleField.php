<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


use LeadFerret\Lib\API\Exceptions\InvalidParameterException;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class DoubleField extends DataField
{
    
    protected $cast = 'double';
    
    public function setData($data)
    {
        if(!is_double($data))
            throw new InvalidParameterException('DoubleField data must be a decimal / float ');
        
        $this->data = $data;
        return $this;
    }
    
    /**
     * This is a char so it will always be just a string
     */
    public function getData()
    {
        return (double) $this->data;
    }
    
}