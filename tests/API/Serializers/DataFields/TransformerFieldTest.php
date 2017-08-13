<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\Tests\API\Serializers\BookTransformer;
use Solvire\API\Serializers\DataFields\TransformerField;
use Solvire\Tests\API\Serializers\TestBook;

/**
 * 
 * @group DataFields
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
 */
class TransformerFieldTest extends \BaseTestCase
{

    /**
     * 
     */
    public function testTransformerFieldWorking()
    {

        $book = new TestBook();
        $tf = new TransformerField([
            'transformer'=> (new BookTransformer()), 
            'callback' => function($model){ return $model; } ]);
        $tf->setData($book);
        $ret = $tf->getData();
        $this->assertEquals($book->year, $ret['yr']);
    }

}
