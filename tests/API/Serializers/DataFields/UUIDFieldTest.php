<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\UUIDField;
/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
 */
class UUIDFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testUUIDFieldNotWorking()
    {
        $uuid = new UUIDField();
        $uuid->setData('test');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testUUIDFieldGetDataNotWorking()
    {
        $uuid = new UUIDField();
        $uuid->getData();
    }
}