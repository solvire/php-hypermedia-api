<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\API\Exceptions\InvalidParameterException;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class BooleanField extends DataField
{

    protected $cast = 'string';

    /**
     * TODO need to set the truthiness of this thing - true == TRUE == True == 1
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        if (! is_bool($data))
            throw new InvalidParameterException('BooleanField data must be a boolean');
        
        $this->data = $data;
        return $this;
    }

    /**
     * This is a Boolean so it will always be just a boolean
     * TODO get the truthiness of this data
     * 
     * @return boolean
     */
    public function getData()
    {
        return (boolean) $this->data;
    }
}