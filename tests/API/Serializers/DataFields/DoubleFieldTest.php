<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\DoubleField;
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
class DoubleFieldTest extends \BaseTestCase
{

    public function testCanSetData()
    {
        $dec = new DoubleField();
        $dec->setData(10.5);
        $this->assertTrue(is_double($dec->getData()));
    }
}
