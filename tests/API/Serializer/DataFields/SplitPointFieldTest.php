<?php
namespace Solvire\API\Serializers\DataFields;


/**
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class SplitPointFieldTest extends \GenericTestCase
{
    protected $requiredFields = ['latitudeColumn'=>'latitude','longitudeColumn'=>'longitude'];

    /**
     */
    public function testCanBuildSplitPointDataFields()
    {
        $sp = new SplitPointField($this->requiredFields);
        
        $this->assertEquals($this->requiredFields['latitudeColumn'],$sp->getLatitudeColumn());
        $this->assertEquals($this->requiredFields['longitudeColumn'],$sp->getLongitudeColumn());
    }
    
    
}
