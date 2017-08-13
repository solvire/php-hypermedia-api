<?php
namespace Solvire\Tests\API\Serializers;

/**
 * 
 * @author solvire <info@scotttactical.com>
 * @package Serializers
 * @namespace Solvire\Tests\API\Serializers
 */
class TestBook
{
    
    public $id = 1001;
    public $title = 'A Snowy Flake';
    public $year = 2021;
    
    public function __construct($id=null)
    {
        if($id)
            $this->id = $id;
    }
    
}