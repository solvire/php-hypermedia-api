<?php
namespace Solvire\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class ListField extends DataField
{

    protected $delimiter = ',';

    public function setData($data)
    {
        if (! is_string($data) && ! is_array($data))
            throw new \RuntimeException('ListField data must be a string CSV or other delimited list: in ' . $this->name );
        
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
     * @return \Solvire\API\Serializers\DataFields\ListField
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
