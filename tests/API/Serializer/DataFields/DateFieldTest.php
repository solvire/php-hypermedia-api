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
class DateFieldTest extends \BaseTestCase
{

    protected $cast = 'string';

    protected $formatType = 'Iso8601';

    /**
     * @expectedException \RuntimeException
     */
    public function testCanSetData()
    {
        $dateField = new DateField();
        $dateField->setData(Carbon::now());
        $this->assertTrue($dateField->getData() instanceof Carbon);
        $dateField->setData(new \DateTime());
        $this->assertTrue($dateField->getData() instanceof \DateTime);
        $dateField->setData('junk');
    }
}
