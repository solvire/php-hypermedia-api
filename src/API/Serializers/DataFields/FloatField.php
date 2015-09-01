<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


use LeadFerret\Lib\API\Exceptions\InvalidParameterException;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class FloatField extends DataField
{
    
    protected $cast = 'float';
    
    public function setData($data)
    {
        if(!is_float($data))
            throw new InvalidParameterException('FloatField data must be a float/double');
        
        $this->data = $data;
        return $this;
    }
    
    /**
     * This is a char so it will always be just a string
     */
    public function getData()
    {
        return (float) $this->data;
    }
    
}