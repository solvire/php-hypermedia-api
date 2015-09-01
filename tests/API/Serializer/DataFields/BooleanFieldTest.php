<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 * @author solvire <stevenjscott@gmail.com>
 * @group DataFields
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class BooleanFieldTest extends \GenericTestCase
{
    
    public function testCanSetData()
    {
        
        $b = new BooleanField();
        $b->setData(true);
        $this->assertTrue($b->getData());
        
        $b->setData(false);
        $this->assertFalse($b->getData());
    }
    
}
