<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class PointFieldTest extends \GenericTestCase
{
    /**
     * @expectedException \RuntimeException
     */
    public function testCanSetListData()
    {
        $lat = 34.1777347;
        $lon = -118.4893159;
        
        $point = new PointField([]);
        $point->setData(['latitude'=>$lat,'longitude'=>$lon]);
        
        $this->assertTrue(is_array($point->getData()));
        $this->assertCount(2,$point->getData());
        $this->assertEquals($point->getData()['latitude'], $lat);
        
        $point->setData('nothing');
        
        
    }
    
}