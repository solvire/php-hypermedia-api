<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\API\Exceptions\InvalidParameterException;

/**
 * Kind of a hack to couple the data elements in separate fields as a single point for representation
 * In GIS databases this would be one data element.
 *
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class PointField extends DataField
{

    protected $cast = 'array';

    public function __construct($options)
    {
        parent::__construct($options);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        if ((! is_array($data) || ! isset($data['latitude']) || ! isset($data['longitude'])) && ! $this->allowNull())
            throw new InvalidParameterException('PointField data must be an array of fields with keys of latitude and longitude');
            
            // keeping it clean
            // don't want other fields slipping in
        $this->data = [
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude']
        ];
        return $this;
    }

    /**
     * This is a char so it will always be just a string
     */
    public function getData()
    {
        return $this->data;
    }
}
