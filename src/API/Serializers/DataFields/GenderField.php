<?php
namespace Solvire\API\Serializers\DataFields;


use Solvire\Utilities\GenderNormalizer as G;
/**
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class GenderField extends DataField
{

    /**
     *
     * @var string
     */
    protected $cast = 'string';
    
    protected $maleValue = 'male';
    
    protected $femaleValue = 'female';
    
    /**
     *
     * @param array $options
     */
    public function __construct($options=[])
    {
        // load up the format at creation time
        if(isset($options['maleValue']))
            $this->maleValue = $options['maleValue'];

        if(isset($options['femaleValue']))
            $this->femaleValue = $options['femaleValue'];
        
        parent::__construct($options);
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        if (! is_string($data))
            throw new \RuntimeException('GenderField data must be a valid representation of a normalized gender : ' . $data . ' in ' . $this->name );
        
        $gender = G::spot($data);
        
        if($gender === 'male')
            $this->data = $this->maleValue;
        elseif ($gender === 'female')
            $this->data = $this->femaleValue;
        
        
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
        return $this->data;
    }
    
    public function setMaleValue($male)
    {
        $this->maleValue = $male;
    }
    
    public function setFemaleValue($female)
    {
        $this->femaleValue = $female;
    }
}
