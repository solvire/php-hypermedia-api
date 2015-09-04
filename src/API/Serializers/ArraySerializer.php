<?php
namespace Solvire\API\Serializers;

use LF\Utility\OptionsChecker as Ch;

/**
 * Just map a static output 
 * Methods are only GET 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\API\Serializers
 */
abstract class ArraySerializer extends BaseSerializer
{
    protected $methods = ['get'];


    /**
     * (non-PHPdoc)
     * @see \Solvire\API\Serializers\BaseSerializer::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
    
    /**
     * 
     * @return multitype:NULL
     */
    public function toArray()
    {
        $ret = [];
        $dfc = $this->getDataFieldCollection();
        foreach($dfc as $name => $obj)
        {
            $ret[$name] = $obj->getData();
        }
        
        return $ret;
    }
    

    /**
     *
     * @param array $data
     */
    public function loadData($data)
    {
        Ch::ek($data, $this->requiredOptions);
        foreach($data as $name => $value)
        {
            if(!($df = $this->getField($name)))
                throw new \RuntimeException("field not set $name");
    
            $df->setData($value);
        }
    
        return $this;
    }
    
}