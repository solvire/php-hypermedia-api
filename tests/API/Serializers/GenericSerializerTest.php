<?php
namespace Solvire\Tests\API\Serializers;

use Solvire\Tests\API\Serializers\ArraySerializerConcrete;
/**
 * For testing the items in the base or otherwise that haven't been covered
 *
 * @group Serializers
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\Tests\API\Serializers
 */
class GenericSerializerTest extends \BaseTestCase
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
