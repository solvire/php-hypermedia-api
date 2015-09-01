<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class ReadOnlyFieldTest extends \GenericTestCase
{
    
    /**
     * @expectedException \RuntimeException
     */
    public function testReadOnlyFieldNotWorking()
    {
        $ro = new ReadOnlyField();
        $ro->setData('test');
    }

     /**
      * @expectedException \RuntimeException
      * 
      */
    public function testReadOnlyFieldGetDataNotWorking()
    {
        $ro = new ReadOnlyField();
        $ro->getData();
    }
    
}