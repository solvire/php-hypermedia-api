<?php
namespace Solvire\API\JSONSchema;

/**
 * returns the array/objects for json serialization 
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @namespace Solvire\API\JSONSchema
 */
interface Schemable
{
    
    /**
     * returns the data
     */
    public function toSchema();
    
    /**
     * there should always be a check before returning the data
     * make sure all fields are set 
     */
    public function allSet();
    
    
}