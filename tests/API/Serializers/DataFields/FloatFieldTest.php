<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\FloatField;
/**
 * same as double - just semantics here
 *
 * @group DataFields
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
 */
class FloatFieldTest extends \BaseTestCase
{

    protected $cast = 'float';

    public function testCanSetData()
    {
        $dec = new FloatField();
        $dec->setData(10.5);
        $this->assertTrue(is_float($dec->getData()));
    }
}
