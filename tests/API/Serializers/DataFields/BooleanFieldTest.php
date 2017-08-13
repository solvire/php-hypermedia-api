<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\BooleanField;
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
class BooleanFieldTest extends \BaseTestCase
{

    public function testCanSetData()
    {
        $b = new BooleanField();
        $b->setData(true);
        $this->assertTrue($b->getData());
        
        $b->setData(false);
        $this->assertFalse($b->getData());
    }
}
