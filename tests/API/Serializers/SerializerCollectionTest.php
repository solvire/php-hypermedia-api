<?php
namespace Solvire\Tests\API\Serializers;

use PhpCollection\Sequence;
use Solvire\API\Serializers\SerializerCollection;

/**
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\Tests\API\Serializers
 */
class SerializerCollectionTest extends \BaseTestCase
{

    /**
     * 
     */
    public function testCanConstructSerializerCollection()
    {
        
        $sers = [
            's1' => new LaravelModelSerializerConcrete()
        ];
        
        $col = new SerializerCollection($sers);
        $col->add(new LaravelModelSerializerConcrete());
        $arr = $col->toArray();
        
        try {
            $col->add(new \stdClass());
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
        
        try {
            new SerializerCollection([new \stdClass()]);
        } catch (\RuntimeException $e) {
            $this->assertInstanceOf('\RuntimeException', $e);
        }
        
    }

}
