<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\API\Exceptions\InvalidParameterException;

/**
 * IP Address is stored as a binary structure.
 *
 *
 * @see http://php.net/manual/en/function.inet-pton.php
 * @see http://php.net/manual/en/function.inet-ntop.php
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class IPAddressField extends DataField
{

    public function setData($data)
    {
        if (! is_string($data))
            throw new InvalidParameterException(__CLASS__ . ' data must be a string representation of an IP Address: ' . $data . ' in ' . $this->name );
        
        $this->data = inet_pton($data);
        
        if ($this->data === false)
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
