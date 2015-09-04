<?php
namespace Solvire\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class DataFieldTest extends \GenericTestCase
{

    /**
     * these are hard values 
     * we are testing for them along the way so do not change them
     * if you need new values create a new options list 
     * 
     * @return array
     */
    protected function getOptions1()
    {
        return [
            'columnName' => 'test_column',
            'readOnly' => true,
            'writeOnly' => false,
            'required' => true,
            'allowNull' => false,
            'defaultValue' => 'somestring',
            'initial' => 'newvalue',
            'label' => 'The Value',
            'helpTest' => 'Please Fill Some Text',
            'style' => 'stringstyle',
            'errorMessages' => ['you failed'],
            'validators' => null
        ];
    }
    

}