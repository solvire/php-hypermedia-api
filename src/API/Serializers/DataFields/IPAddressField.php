<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


use LeadFerret\Lib\API\Exceptions\InvalidParameterException;

/**
 * IP Address is stored as a binary structure. 
 * 
 * @see http://php.net/manual/en/function.inet-pton.php
 * @see http://php.net/manual/en/function.inet-ntop.php
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class IPAddressField extends DataField
{
    
    public function setData($data)
    {
        if(!is_string($data))
            throw new InvalidParameterException(__CLASS__ . ' data must be a string representation of an IP Address');
        
        $this->data = inet_pton($data);
        
        if($this->data === false)
            throw new InvalidParameterException(__CLASS__ . ' your string did not decode properly ');
        
        return $this;
    }
    
    /**
     * Return this data in readable form
     */
    public function getData()
    {
        return inet_ntop($this->data);
    }
    
}
