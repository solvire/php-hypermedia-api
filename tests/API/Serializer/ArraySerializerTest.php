<?php
namespace LeadFerret\Lib\API\Serializers;

use Carbon\Carbon;
include_once(realpath( __DIR__ . '/ArraySerializerConcrete.php'));

/**
 * Just map a static output
 * Methods are only GET
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 *          @group Serializers
 * @namespace LeadFerret\Lib\API\Serializers
 */
class ArraySerializerTest extends \GenericTestCase
{

    public function testCanBuildArraySerializer()
    {
        $ars = new ArraySerializerConcrete();
        $data = $ars->loadData([
            'status' => 'OK',
            'ip' => '192.168.1.1',
            'you' => 'Google Bot',
            'stage' => env('APPLICATION_ENVIRONMENT'),
            'alive' => true,
            'server_data' => 'Solvire API',
            'timestamp' => Carbon::now()
        ]);
        
        $this->assertTrue(is_array($data->toArray()));
        $this->assertCount(7, $data->toArray());
        
        $json = json_encode($data);
        $this->assertTrue(is_string($json));
        $this->assertTrue(is_object(json_decode($json)));
    }
}
