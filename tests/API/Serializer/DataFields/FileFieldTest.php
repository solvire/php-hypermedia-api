<?php
namespace Solvire\API\Serializers\DataFields;


/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class FileFieldTest extends \GenericTestCase
{
    
    /**
     * @expectedException \RuntimeException
     */
    public function testFileFieldNotWorking()
    {
        $f = new FileField();
        $f->setData('test');
    }

     /**
      * @expectedException \RuntimeException
      * 
      */
    public function testFileFieldGetDataNotWorking()
    {
        $f = new FileField();
        $f->getData();
    }
}