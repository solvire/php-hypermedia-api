<?php
namespace Solvire\API\Serializers\DataFields;


use Respect\Validation\Validator as v;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class EmailField extends DataField
{
    
    protected $cast = 'string';
    
    public function setData($data)
    {
        if (! is_string($data) || !v::email()->validate($data)) 
            throw new \RuntimeException('EmailField data must be a valid representation of an email address ');
        
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