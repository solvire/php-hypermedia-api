<?php
namespace Solvire\API\Serializers;

use Illuminate\Database\Eloquent\Model;
use Solvire\API\Serializers\DataFields\SplitPointField;
use Solvire\API\Serializers\DataFields\SerializerField;
use Solvire\API\Serializers\DataFields\TransformerField;

/**
 * Map a Laravel 5.x model to a serializer
 *
 * @author solvire <info@scotttactical.com>
 * @package Serializers
 * @namespace Solvire\API\Serializers
 */
abstract class LaravelModelSerializer extends BaseSerializer
{

    /**
     *
     * @var Model
     */
    protected $model = null;

    /**
     *
     * @param Model $model            
     * @return \Solvire\API\Serializers\LaravelModelSerializer
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * is update = when updating the database
     *
     * @param string $isUpdate            
     * @return multitype:NULL
     */
    public function toArray($isUpdate = false)
    {
        $ret = [];
        $dfc = $this->getDataFieldCollection();
        foreach ($dfc as $name => $dataField) {
            
            // write only fields should not be displayed 
            if($dataField->writeOnly())
                continue;
            
            $ret[$name] = $dataField->getData();
        }
        
        return $ret;
    }

    /**
     *
     * @param array $data            
     */
    public function loadData($model)
    {
        
        // make sure that this is a laravel model
        if (! $model instanceof Model)
            throw new \RuntimeException("the object must be of type Illuminate\Database\Eloquent\Model ");
            
        // loop through all the set fields in the collection
        // if they have a matching name then load them up from the model
        // if they have a matching columnName then find the value and load that up instead
        $dfc = $this->getDataFieldCollection();
        foreach ($dfc as $name => $dataField) {
            $col = $dataField->columnName();
            
            // i don't think laravel has a point type data field
            // we need to check to see if it's a point field split and combine it
            if ($dataField instanceof SplitPointField) {
                $this->loadSplitPoint($dataField, $model);
                continue;
            }
            
            
            // if this is a child serializer object then pass it down
            // we assume that since we are in laravel environment that we will have subs of the same
            // also assuming that the name of the column is the function name 
            if($dataField instanceof SerializerField) {
                
                // this might be better as a callback instead 
                // get the field name to call
                $dataField->setData($model);
                continue;
                
            }
            
            // if this is a child transformer object then pass it down
            // I need more use cases to see where htis will break 
            if($dataField instanceof TransformerField) {
                $dataField->setData($model);
                continue;
            }
            
            
            // if we have a column name then use that first
            $data = ($col) ? $model->$col : $model->$name;
            
            if (($data === null) && ! $dataField->allowNull())
                continue;
            
            if (($data === '') && ! $dataField->allowEmpty())
                continue;
            
            $dataField->setData($data);
        }
        
        return $this;
    }

    public function loadSplitPoint($dataField, $model)
    {
        $lat = $dataField->getLatitudeColumn();
        $lon = $dataField->getLongitudeColumn();
        $dataField->setData([
            'latitude' => $model->$lat,
            'longitude' => $model->$lon
        ]);
    }
}
