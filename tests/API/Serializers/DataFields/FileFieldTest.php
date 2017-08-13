<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\FileField;
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
class FileFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testFileFieldNotWorking()
    {
        $f = new FileField();
        $f->setData('test');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testFileFieldGetDataNotWorking()
    {
        $f = new FileField();
        $f->getData();
    }
}