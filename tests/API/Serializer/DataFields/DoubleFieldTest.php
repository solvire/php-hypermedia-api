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
class DoubleFieldTest extends \BaseTestCase
{

    public function testCanSetData()
    {
        $dec = new DoubleField();
        $dec->setData(10.5);
        $this->assertTrue(is_double($dec->getData()));
    }
}
