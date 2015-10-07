<?php
namespace Solvire\Tests\API\Renderers;

use Solvire\Tests\API\Serializers\TestBook;
use Solvire\API\Renderers\ListRenderer;
/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Renderers
 * @namespace Solvire\API\Renderers\GenericRenderer
 */
class ListRendererConcrete extends ListRenderer
{
    
    public function get()
    {
        return [
            new TestBook()
        ];
    }
    
}