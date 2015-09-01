<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class ListField extends \GenericTestCase
{

    protected $delimiter = ',';

    public function setData($data)
    {
        if (! is_string($data) && ! is_array($data))
            throw new \RuntimeException('ListField data must be a string CSV or other delimited list');
        
        if (is_string($data))
            $data = explode($this->delimiter, $data);
        
        $this->data = $data;
        return $this;
    }

    /**
     * TODO fix the list implosion thing here
     * This is a list (array)
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     *
     * @param string $delimiter            
     * @return \LeadFerret\Lib\API\Serializers\DataFields\ListField
     */
    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getDelimiter()
    {
        return $this->delimiter;
    }
}
