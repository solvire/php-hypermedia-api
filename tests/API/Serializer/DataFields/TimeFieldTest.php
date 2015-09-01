<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @name sapce LeadFerret\Lib\API\Serializers\DataFields
 */
class TimeFieldTest extends \GenericTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testTimeFieldNotWorking()
    {
        $t = new TimeField();
        $t->setData('test');
    }
    
    /**
     * @expectedException \RuntimeException
     *
     */
    public function testTimeFieldGetDataNotWorking()
    {
        $t = new TimeField();
        $t->getData();
    }
}