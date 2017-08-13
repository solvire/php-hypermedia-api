<?php
namespace Solvire\Tests\API\Renderers;

use Solvire\Tests\API\Serializers\TestBook;
use Solvire\API\Renderers\ListRenderer;
use Illuminate\Pagination\LengthAwarePaginator;
/**
 *
 * @author solvire <info@scotttactical.com>
 * @package Renderers
 * @namespace Solvire\API\Renderers\GenericRenderer
 */
class ListRendererConcrete extends ListRenderer
{
    public $itemCount = 10;
    
    public $perPage = 2;
    
    public $path = 'http://scotttactical.com/';
    
    public $pageName = 'round';
    
    
    
    public function get()
    {
        
        $items = [];
        for ($i = 1; $i <= $this->itemCount; $i++) {
            $items[$i] = ['status'=>'OK','timestamp'=> new \Carbon\Carbon()];
        }
        
        $options = ['path' => $this->path, 'pageName' => $this->pageName];
        
        $this->resultSet = new LengthAwarePaginator($items, count($items), $this->perPage, 2, $options);
        
        return $this->paginate($this->resultSet);
        
    }
    
}
