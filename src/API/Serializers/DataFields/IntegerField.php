<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class IntegerField extends DataField
{
    
    protected $cast = 'integer';
    
    public function setData($data)
    {
        if(!is_int($data))
            throw new \RuntimeException('IntegerField data must be an integer ');
        
        $this->data = $data;
        return $this;
    }
    
    /**
     * This is a int so it will always be just a integer
     */
    public function getData()
    {
        return (int) $this->data;
    }
    
}