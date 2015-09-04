<?php
namespace Solvire\API\Serializers\DataFields;


/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class ImageFieldTest extends \GenericTestCase
{
    
    /**
     * @expectedException \RuntimeException
     */
    public function testImageFieldNotWorking()
    {
        $i = new ImageField();
        $i->setData('test');
    }

     /**
      * @expectedException \RuntimeException
      * 
      */
    public function testImageFieldGetDataNotWorking()
    {
        $i = new ImageField();
        $i->getData();
    }
    
}