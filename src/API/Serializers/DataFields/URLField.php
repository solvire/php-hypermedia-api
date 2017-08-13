<?php
namespace Solvire\API\Serializers\DataFields;

use Respect\Validation\Validator as v;

/**
 * TODO need to find a library that handles url parsing well
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class URLField extends DataField
{

    protected $cast = 'string';

    /**
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        if (! is_string($data) || ! v::url()->validate($data))
            throw new \RuntimeException('URLField data must be a string representation of a URL : ' . $data . ' in ' . $this->name );
        
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
