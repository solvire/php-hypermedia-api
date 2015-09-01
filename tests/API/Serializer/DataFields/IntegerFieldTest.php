<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class IntegerFieldTest extends \GenericTestCase
{
    /**
     * @expectedException \RuntimeException
     */
    public function testCanSetData()
    {
        $dec = new IntegerField();
        $dec->setData(10);
        $this->assertTrue(is_int($dec->getData()));
        $dec->setData('10');
    }
    
}