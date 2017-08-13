<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\RegexField;
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