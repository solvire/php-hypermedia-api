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
class RegexFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testRegexFieldNotWorking()
    {
        $rx = new RegexField();
        $rx->setData('test');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testRegexFieldGetDataNotWorking()
    {
        $rx = new RegexField();
        $rx->getData();
    }
}