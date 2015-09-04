<?php
namespace Solvire\API\Serializers\DataFields;

/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class SplitPointFieldTest extends \BaseTestCase
{

    protected $requiredFields = [
        'latitudeColumn' => 'latitude',
        'longitudeColumn' => 'longitude'
    ];

    /**
     */
    public function testCanBuildSplitPointDataFields()
    {
        $sp = new SplitPointField($this->requiredFields);
        
        $this->assertEquals($this->requiredFields['latitudeColumn'], $sp->getLatitudeColumn());
        $this->assertEquals($this->requiredFields['longitudeColumn'], $sp->getLongitudeColumn());
    }
}
