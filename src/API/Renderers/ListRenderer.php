<?php
namespace Solvire\API\Renderers;

use Solvire\API\Serializers\BaseSerializer;

/**
 * Like the view.
 * Just outputs what the serializer is going to give back to it
 * must implement the get() funtion
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Renderers
 * @namespace Solvire\API\Renderers
 */
abstract class ListRenderer extends GenericRenderer implements Getable
{

    protected $resultSet = null;

    protected $resultArray = [];

    protected $paginationLimit = null;

    public function nextPageUrl()
    {
        return $this->resultSet->nextPageUrl();
    }

    public function previousPageUrl()
    {
        return $this->resultSet->previousPageUrl();
    }

    public function firstItem()
    {
        return $this->resultSet->firstItem();
    }

    public function lastItem()
    {
        return $this->resultSet->firstItem();
    }

    public function lastPage()
    {
        return $this->resultSet->lastPage();
    }

    public function perPage()
    {
        return $this->resultSet->perPage();
    }

    public function currentPage()
    {
        return $this->resultSet->currentPage();
    }

    public function hasPages()
    {
        return $this->resultSet->hasPages();
    }

    public function hasMorePages()
    {
        return $this->resultSet->hasMorePages();
    }

    public function isEmpty()
    {
        return $this->resultSet->isEmpty();
    }

    public function total()
    {
        return $this->resultSet->total();
    }

    public function setPaginationLimit($paginationLimit)
    {
        $this->paginationLimit = $paginationLimit;
        return $this;
    }

    public function getPaginationLimit()
    {
        if($this->paginationLimit == null)
            throw new \RuntimeException("The page limit is not set");
        return $this->paginationLimit;
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
