<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\ImageField;
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
class ImageFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testImageFieldNotWorking()
    {
        $i = new ImageField();
        $i->setData('test');
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testImageFieldGetDataNotWorking()
    {
        $i = new ImageField();
        $i->getData();
    }
}