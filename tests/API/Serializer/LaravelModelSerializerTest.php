<?php
namespace Solvire\API\Serializers;

use Illuminate\Database\Eloquent\Model;
require_once (realpath(__DIR__ . '/CompanyModel.php'));
require_once (realpath(__DIR__ . '/LaravelModelSerializerConcrete.php'));

/**
 * Map a Laravel 5.x model to a serializer
 * @group Serializers
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\API\Serializers
 */
class LaravelModelSerializerTest extends \BaseTestCase
{

    public function testCanSerializeLaravelUserModel()
    {
        $ser = new LaravelModelSerializerConcrete();
        
        $co = new CompanyModel();
        $co->company_name = 'Name';
        $co->Address = '123 fake st';
        $co->State = 'CA';
        $co->zipcode = '91361';
        $co->latitude = 34.1234;
        $co->longitude = -119.3908;
        $co->email = 'test@testdomain.com';
        
        $ser->setModel($co);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Model', $ser->getModel());
        $ser->loadData($co);
        
        $arr = $ser->toArray();
        $this->assertTrue(is_array($arr));
        
        $json = json_encode($ser);
        $this->assertTrue(is_string($json));
        
        $ef = $ser->getField('email');
        $this->assertInstanceOf('Solvire\API\Serializers\DataFields\EmailField', $ef);
    }
}
