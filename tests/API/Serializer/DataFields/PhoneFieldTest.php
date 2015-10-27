<?php
namespace Solvire\API\Serializers\DataFields;

/**
 * IP Address is stored as a binary structure.
 *
 *
 * @group DataFields
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class PhoneFieldTest extends \BaseTestCase
{

    /**
     */
    public function testCanSetPhoneFieldData()
    {
        $d = '(818) 111-2234';
        
        $df = new PhoneField();
        $df->setData($d);
        $this->assertEquals($df->getData(), $d);
        
    }
}
