<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\Tests\API\Serializers\ArraySerializerConcrete;
use Solvire\API\Serializers\DataFields\SerializerField;
/**
 *
 *
 *
 * @group DataFields
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
 */
class SerializerFieldTest extends \BaseTestCase
{

    /**
     * 
     * @return multitype:unknown \DateTime
     */
    public function testSerializerFieldNotWorking()
    {
        $health = function ($model)
        {
        	return ['status' => $model, 'timestamp' => new \DateTime()];
        };
        $rx = new SerializerField(['serializer' => new ArraySerializerConcrete(), 'callback' => $health]);
        $rx->setData('unit_test');
        $rval = $rx->getData()->toArray();
        
        $this->assertTrue(isset($rval['status']));
        $this->assertEquals('unit_test',$rval['status']);
        $this->assertInstanceOf('\Carbon\Carbon', $rval['timestamp']);
        
        $this->assertInstanceOf('\Solvire\API\Serializers\BaseSerializer', $rx->getSerializer());
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testSerializerFieldCantPassNonSerializerWorking()
    {
        $rx = new SerializerField(['serializer' => new \stdClass(),'callback' => 'blah']);
    }
}
