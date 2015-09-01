<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


use Carbon\Carbon;

/**
 * @author solvire <stevenjscott@gmail.com>
 * @group DataFields
 * @package DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class DateFieldTest extends \GenericTestCase
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
        $this->assertTrue($dateField->getData() instanceOf Carbon);
        $dateField->setData(new \DateTime());
        $this->assertTrue($dateField->getData() instanceOf \DateTime);
        $dateField->setData('junk');
    }
    
}
