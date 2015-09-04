<?php
namespace Solvire\API\Serializers\DataFields;

use Carbon\Carbon;

/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class DateTimeFieldTest extends \BaseTestCase
{

    protected $cast = 'string';

    protected $formatType = 'Iso8601';

    /**
     * @expectedException \RuntimeException
     */
    public function testCanSetData()
    {
        $dateField = new DateTimeField();
        $dateField->setData(Carbon::now());
        $this->assertTrue($dateField->getData() instanceof Carbon);
        $dateField->setData(new \DateTime());
        $this->assertTrue($dateField->getData() instanceof \DateTime);
        $dateField->setData('2015-01-01T12:34:00-5:00');
        $this->assertTrue($dateField->getData() instanceof Carbon);
        $dateField->setData('junk');
    }
}
