<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


use LeadFerret\Lib\API\Exceptions\InvalidParameterException;
use Solvire\Utilities\OptionsChecker as Ch;

/**
 * Kind of a hack to couple the data elements in separate fields as a single point for representation 
 * In GIS databases this would be one data element. 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class SplitPointField extends PointField
{
    protected $requiredFields = ['latitudeColumn','longitudeColumn'];
    
    protected $cast = 'array';
    
    protected $latitudeColumn = 'latitude';
    
    protected $longitudeColumn = 'longitude';
    
    /**
     * among the other variables we need to have the column names for longitude and latitude added in here
     * 
     * @param array $options
     */
    public function __construct($options)
    {
        Ch::ek($options, $this->requiredFields);
        $this->latitudeColumn = $options['latitudeColumn'];
        $this->longitudeColumn = $options['longitudeColumn'];
        parent::__construct($options);
    }    
    
    public function getLatitudeColumn()
    {
        return $this->latitudeColumn;
    }
    
    public function getLongitudeColumn()
    {
        return $this->longitudeColumn;
    }
    
}
