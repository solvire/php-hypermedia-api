<?php
namespace Solvire\API\Serializers;


use Solvire\API\Serializers\DataFields\CharField;
use Solvire\API\Serializers\DataFields\EmailField;
use Solvire\API\Serializers\DataFields\IntegerField;
use Solvire\API\Serializers\LaravelModelSerializer;
use Solvire\API\Serializers\DataFields\SplitPointField;


/**
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\Http\Controllers\API\Serializers
 */
class LaravelModelSerializerConcrete extends LaravelModelSerializer
{

    
    /**
     * (non-PHPdoc)
     * @see \Solvire\API\Serializers\BaseSerializer::initDataFields()
     */
    public function initDataFields()
    {
        
        $this->addField('id', new IntegerField(['readOnly'=>true, 'columnName'=>'ComapnyID']))
             ->addField('business_name', new CharField(['columnName'=>'company_name']))
             ->addField('address', new CharField(['columnName'=>'Address']))
             ->addField('city', new CharField(['columnName'=>'City']))
             ->addField('state', new CharField(['columnName'=>'State']))
             ->addField('zipcode', new IntegerField())
             ->addField('email', new EmailField())
             ->addField('location', new SplitPointField(['latitudeColumn' => 'latitude', 'longitudeColumn' => 'longitude', 'allowNull' => true]));
    }
    
    
}
