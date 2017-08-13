<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Carbon\Carbon;
use Solvire\API\Serializers\DataFields\DateTimeField;

/**
 *
 *
 *
 * @group DataFields
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
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
        
        $dataField = new DateTimeField();
        $dataField->setFormat('Y-m-d H:i:s');
        $dataField->setData('2015-01-01 12:30:00');
        
        $dateField->setData('junk');
    }
}
