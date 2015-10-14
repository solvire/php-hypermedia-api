<?php
namespace Solvire\Tests\API\Renderers;

use Mockery\Mock as m;
use Solvire\API\Serializers\BaseSerializer;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
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

    /**
     * mock object for the
     *
     * @var \Illuminate\Pagination\LengthAwarePaginator
     */
    protected $resultSet = null;

    protected $baseUrl = 'https://test.com';

    public function setup()
    {
//         $this->resultSet = $this->getMockBuilder('\Illuminate\Pagination\LengthAwarePaginator')
//             ->setMethods([
//             'nextPageUrl',
//             'previousPageUrl',
//             'firstItem',
//             'lastItem',
//             'lastPage',
//             'perPage',
//             'currentPage',
//             'hasPages',
//             'hasMorePages',
//             'isEmpty',
//             'total',
//             'getIterator'
//         ])
//             ->disableOriginalConstructor()
//             ->getMock();
        
//         // Set up the expectation for the update() method
//         // to be called only once
//         // we are assuming this is SECOND PAGE
//         $this->resultSet->expects($this->any())
//             ->method('nextPageUrl')
//             ->with($this->equalTo($this->baseUrl . '?page=3'));
        
//         $this->resultSet->expects($this->any())
//             ->method('previousPageUrl')
//             ->with($this->equalTo($this->baseUrl . '?page=1'));
        
//         $this->resultSet->expects($this->any())
//             ->method('getIterator')
//             ->with(['test']);
        

        
    }

    public function testCanCreateListRendererAndRender()
    {
        $ren = new ListRendererConcrete();
        $ren->setSerializer(new ArraySerializerConcrete());
        $vars = $ren->get();
        $this->assertTrue(isset($vars['items']));
        $this->assertEquals($ren->itemCount, count($vars['items']));
        
        $this->assertEquals($ren->path . '?' . $ren->pageName . '=3',$ren->nextPageUrl());
        
//         $ren->paginate($this->resultSet);
    }

    /**
     *
     * @param
     *            array transformable object
     */
    public function paginate($resultSet)
    {
        $this->resultSet = $resultSet;
        // TODO figure out how to check to see if we can paginate this
        // something about transformable
        $retarr = [];
        
        // we know that the set can be iterated over
        // and that each item in the record set should match up to the serializer object
        foreach ($resultSet as $key => $record) {
            $item = $this->serializer->loadData($record);
            $retarr[] = $item->toArray();
        }
        
        $this->resultArray = $retarr;
        
        return [
            'items' => $retarr
        ];
    }

    /**
     *
     * @see https://google-styleguide.googlecode.com/svn/trunk/jsoncstyleguide.xml#Reserved_Property_Names_for_Paging
     */
    public function generateLinks()
    {
        $retarr = [];
        
        $retarr['currentItemCount'] = count($this->resultArray);
        
        $retarr['itemsPerPage'] = $this->getPaginationLimit();
        
        // TODO get the ID of the starting element
        // $retarr['startIndex'] = $this->resultArray[0];
        
        $retarr['totalItems'] = $this->total();
        
        // TODO fix the paging template for links
        // $retarr['pagingLinkTemplate'] = $this->resultSet
        
        // 1 based
        $retarr['pageIndex'] = $this->currentPage();
        
        $retarr['totalPages'] = $this->lastPage();
        
        if ($this->hasPages()) {
            // TODO need to set up the current page link
            // $retarr['selfLink']
            $retarr['nextLink'] = $this->nextPageUrl();
            $retarr['previousLink'] = $this->previousPageUrl();
        }
        
        return $retarr;
    }
}
