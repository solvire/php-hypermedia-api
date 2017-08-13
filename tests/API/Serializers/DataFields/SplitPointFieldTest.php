<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\SplitPointField;
/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
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
