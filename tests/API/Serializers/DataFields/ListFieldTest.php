<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\ListField;
/**
 *
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
 */
class ListFieldTest extends \BaseTestCase
{

    /**
     * @expectedException \RuntimeException
     */
    public function testCanSetListData()
    {
        $l1 = [
            '1',
            '2',
            '3'
        ];
        $l2 = '1,2,3';
        
        $list = new ListField();
        $list->setData($l1);
        $this->assertTrue(is_array($list->getData()));
        $this->assertCount(3, $list->getData());
        
        $list->setData($l2);
        $this->assertTrue(is_array($list->getData()));
        $this->assertCount(3, $list->getData());
        
        $list->setDelimiter($delimiter = '|');
        $this->assertEquals($list->getDelimiter(), '|');
        
        $list->setData(new \stdClass());
    }
}
