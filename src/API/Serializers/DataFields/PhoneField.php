<?php
namespace Solvire\API\Serializers\DataFields;

use Respect\Validation\Validator as v;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class PhoneField extends DataField
{

    /**
     *
     * @var string
     */
    protected $cast = 'string';

    /**
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        if (! is_string($data) || ! v::phone()->validate($data))
            throw new \RuntimeException('PhoneNumberField data must be a valid representation of a phone number ');
        
        $this->data = $data;
        return $this;
    }

    /**
     * This is a char so it will always be just a string
     *
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\Serializers\DataFields\DataField::getData()
     * @return string
     */
    public function getData()
    {
        return (string) $this->data;
    }
}
