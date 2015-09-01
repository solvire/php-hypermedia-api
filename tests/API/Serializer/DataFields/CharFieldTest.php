<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class CharFieldTest extends \GenericTestCase
{

    public function testCanCreateCharWithOptions()
    {
        $options = $this->getOptions();
        
        $char = new CharField($options);
        $this->assertInstanceOf('LeadFerret\Lib\API\Serializers\DataFields\CharField', $char);
        
        $this->assertEquals($char->columnName(), $options['columnName']);
        $this->assertEquals($char->allowNull(), $options['allowNull']);
        $this->assertEquals($char->readOnly(), $options['readOnly']);
        $this->assertEquals($char->writeOnly(), $options['writeOnly']);
        $this->assertEquals($char->required(), $options['required']);
        $this->assertEquals($char->defaultValue(), $options['defaultValue']);
        $this->assertEquals($char->label(), $options['label']);
        $this->assertEquals($char->initial(), $options['initial']);
        $this->assertEquals($char->helpText(), $options['helpText']);
        $this->assertEquals($char->style(), $options['style']);
        $this->assertEquals($char->validators(), $options['validators']);
        $this->assertEquals($char->getName(), $options['name']);
    }

    public function testCanSetData()
    {
        $char = new CharField();
        $char->setData('test_data');
        $this->assertEquals($char->getRaw(), 'test_data');
        $this->assertEquals($char->getData(), 'test_data');
        $char->setName('test');
        
        $char->setErrorMessages(['error'=>'error message']);
        $this->assertTrue(is_array($char->getErrorMessages()) );
        $this->assertEquals('test',$char->getName());
    }

    protected function getOptions()
    {
        return [
            'name' => 'fieldName',
            'columnName' => 'test_column',
            'readOnly' => true,
            'writeOnly' => false,
            'required' => true,
            'allowNull' => false,
            'defaultValue' => 'somestring',
            'initial' => 'newvalue',
            'label' => 'The Value',
            'helpText' => 'Please Fill Some Text',
            'style' => 'stringstyle',
            'validators' => null
        ];
    }
}
