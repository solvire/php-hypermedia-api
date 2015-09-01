<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


use Carbon\Carbon;

/**
 * @author solvire <stevenjscott@gmail.com>
 * @group DataFields
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class DateTimeFieldTest extends \GenericTestCase
{
    
    protected $cast = 'string';
    
    protected $formatType = 'Iso8601';
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testCanSetData()
    {
        
        $dateField = new DateTimeField();
        $dateField->setData(Carbon::now());
        $this->assertTrue($dateField->getData() instanceOf Carbon);
        $dateField->setData(new \DateTime());
        $this->assertTrue($dateField->getData() instanceOf \DateTime);
        $dateField->setData('2015-01-01T12:34:00-5:00');
        $this->assertTrue($dateField->getData() instanceOf Carbon);
        $dateField->setData('junk');
    }
    
}
