<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

/**
 * same as double - just semantics here 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @group DataFields
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class FloatFieldTest extends \GenericTestCase
{
    
    protected $cast = 'float';
    
    
    public function testCanSetData()
    {
        
        $dec = new FloatField();
        $dec->setData(10.5);
        $this->assertTrue(is_float($dec->getData()));
    }
    
}
