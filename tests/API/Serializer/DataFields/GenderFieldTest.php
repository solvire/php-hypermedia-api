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
class GenderFieldTest extends \BaseTestCase
{

    /**
     */
    public function testCanSetGenderFieldData()
    {
        $d = 'man';
        
        $df = new GenderField();
        $df->setMaleValue('Dude');
        $df->setData($d);
        $this->assertEquals($df->getData(), 'Dude');
        
        $df = new GenderField();
        $df->setFemaleValue('Chick');
        $df->setData('woman');
        $this->assertEquals($df->getData(), 'Chick');
    }
}
