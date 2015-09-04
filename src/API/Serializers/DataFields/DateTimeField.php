<?php
namespace Solvire\API\Serializers\DataFields;

use Carbon\Carbon;

/**
 * A DateTime object - Carbon
 *
 * It would be nicer to us if you pass in an object so we don't have to guess.
 * BTW Carbon Rocks
 *
 * @see http://carbon.nesbot.com/docs/
 *
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class DateTimeField extends DataField
{

    /**
     * default formatting of ISO8601
     *
     * @var string [Y-m-d\TH:i:sO]
     */
    protected $format = Carbon::ISO8601;

    protected $cast = 'datetime';

    /**
     *
     *
     * This can take any of the three formats listed.
     * 
     * @param $data mixed
     *            [string, Carbon, DateTime]
     *            
     * @return $this (non-PHPdoc)
     * @throws RuntimeException
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     */
    public function setData($data)
    {
        try {
            if (is_string($data)) {
                $date = Carbon::createFromFormat($this->format, $data);
            } elseif ($data instanceof Carbon) {
                $date = $data;
            } elseif ($data instanceof \DateTime) {
                $date = Carbon::instance($data);
            }
        } catch (\Exception $e) {
            throw new \RuntimeException('DateTimeField data must be a string representation of a date/time object in format: ' . $this->format, 400, $e);
        }
        
        $this->data = $date;
        return $this;
    }

    /**
     * This is a char so it will always be just a string
     */
    public function getData()
    {
        return $this->data;
    }
}