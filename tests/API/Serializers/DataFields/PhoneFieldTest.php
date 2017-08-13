<?php
namespace Solvire\Tests\API\Serializers\DataFields;

use Solvire\API\Serializers\DataFields\PhoneField;
/**
 * IP Address is stored as a binary structure.
 *
 *
 * @group DataFields
 *
 * @author solvire <info@scotttactical.com>
 * @package DataFields
 * @namespace Solvire\Tests\API\Serializers\DataFields
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
