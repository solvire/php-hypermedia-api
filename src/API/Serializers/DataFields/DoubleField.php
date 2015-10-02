<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\API\Exceptions\InvalidParameterException;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 *          @group DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class DoubleField extends DataField
{

    protected $cast = 'double';

    public function setData($data)
    {
        if (! is_double($data))
            throw new InvalidParameterException('DoubleField data must be a decimal / float : ' . $data . ' in ' . $this->name );
        
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