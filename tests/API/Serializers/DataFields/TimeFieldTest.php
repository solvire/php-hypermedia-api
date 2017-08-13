<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\TimeField;
/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
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