<?php
namespace Solvire\API\Serializers;

/**
 * For testing the items in the base or otherwise that haven't been covered 
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @group Serializers
 * @namespace Solvire\API\Serializers
 */
class GenericSerializerTest extends \GenericTestCase
{

    
    /**
     * @expectedException \RuntimeException 
     */
    public function testCannotSaveBaseSerializer()
    {
        $ars = new ArraySerializerConcrete();
        $ars->save();
    }
    

    /**
     * @expectedException \RuntimeException
     */
    public function testCannotUpdateBaseSerializer()
    {
        $ars = new ArraySerializerConcrete();
        $ars->update();
    }
    

    /**
     * @expectedException \RuntimeException
     */
    public function testCannotCreateBaseSerializer()
    {
        $ars = new ArraySerializerConcrete();
        $ars->create();
    }
}
