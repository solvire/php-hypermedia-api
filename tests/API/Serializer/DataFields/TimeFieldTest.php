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
class TimeFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testTimeFieldNotWorking()
    {
        $t = new TimeField();
        $t->setData('test');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testTimeFieldGetDataNotWorking()
    {
        $t = new TimeField();
        $t->getData();
    }
}