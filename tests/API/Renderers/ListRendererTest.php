<?php
namespace Solvire\Tests\API\Renderers;

use Mockery\Mock as m;
use Solvire\Tests\API\Serializers\ArraySerializerConcrete;

/**
 * 
 * @see https://github.com/laravel/framework/blob/5.1/tests/Pagination/PaginationPaginatorTest.php
 * @group Renderers
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package Renderers
 * @namespace Solvire\API\Renderers
 */
class ListRendererTest extends \BaseTestCase
{

    public function testCanCreateListRendererAndRender()
    {
        $ren = new ListRendererConcrete();
        $ren->setSerializer(new ArraySerializerConcrete());
        $vars = $ren->get();
        $this->assertTrue(isset($vars['items']));
        $this->assertEquals($ren->itemCount, count($vars['items']));
        
        $nextPage = $ren->path . '?' . $ren->pageName . '=3';
        $ren->setPaginationLimit(50);
        $links = $ren->generateLinks();
        
        $this->assertEquals($nextPage,$ren->nextPageUrl());
        $this->assertEquals($nextPage, $links['nextLink']);
        $this->assertEquals($ren->previousPageUrl(), $links['previousLink']);
        
        $this->assertEquals($ren->perPage,$ren->perPage());
        $this->assertEquals(3,$ren->firstItem());
        $this->assertEquals(12,$ren->lastItem());
        $this->assertTrue($ren->hasMorePages());
        $this->assertFalse($ren->isEmpty());
        
        $ren->setPaginationLimit(99);
        $this->assertEquals(99,$ren->getPaginationLimit());
        
        $this->assertNull($ren->getRequest());
        
    }

}
