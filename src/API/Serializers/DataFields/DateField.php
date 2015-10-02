<?php
namespace Solvire\API\Serializers\DataFields;

use Carbon\Carbon;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class DateField extends DataField
{

    protected $cast = 'string';

    /**
     * default formatting of ISO8601
     *
     * @var string [Y-m-d\TH:i:sO]
     */
    protected $format = Carbon::ISO8601;

    /**
     * TODO this needs to handle timezones better.
     * we should check to make sure the wrong timezone isn't set or have some failsafes
     * the return type should be definable and it's not yet
     *
     * (non-PHPdoc)
     *
     * @see \Solvire\API\Serializers\DataFields\DataField::setData()
     * @param
     *            \DateTime
     */
    public function setData($data)
    {
        if (! ($data instanceof \DateTime))
            throw new \RuntimeException('DateField data must be a DateTime object: ' . $data . ' in ' . $this->name );
        $this->data = $data;
        return $this;
    }

    /**
     * This is a char so it will always be just a string
     *
     * @return Carbon or DateTime object
     */
    public function getData()
    {
        return $this->data;
    }
}