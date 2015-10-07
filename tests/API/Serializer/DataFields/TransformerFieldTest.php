<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\API\Serializers\ArraySerializerConcrete;
use Solvire\API\Serializers\TestBook;
use Solvire\API\Serializers\BookTransformer;

// stupid includes stuff not working 
require_once(realpath(__DIR__ . '/../TestBook.php'));
require_once(realpath(__DIR__ . '/../BookTransformer.php'));


/**
 * 
 * @group DataFields
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
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
