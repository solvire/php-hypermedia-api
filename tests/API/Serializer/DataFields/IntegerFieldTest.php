<?php
namespace Solvire\API\Serializers\DataFields;

/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class IntegerFieldTest extends \BaseTestCase
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