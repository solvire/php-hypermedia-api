<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\ReadOnlyField;
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
class ReadOnlyFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testReadOnlyFieldNotWorking()
    {
        $ro = new ReadOnlyField();
        $ro->setData('test');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testReadOnlyFieldGetDataNotWorking()
    {
        $ro = new ReadOnlyField();
        $ro->getData();
    }
}