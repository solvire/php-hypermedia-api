<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 * @author solvire <stevenjscott@gmail.com>
 * @group DataFields
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class DoubleFieldTest extends \GenericTestCase
{
    
    public function testCanSetData()
    {
        
        $dec = new DoubleField();
        $dec->setData(10.5);
        $this->assertTrue(is_double($dec->getData()));
    }
    
}
