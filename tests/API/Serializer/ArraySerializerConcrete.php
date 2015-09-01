<?php
namespace LeadFerret\Lib\API\Serializers;

use LeadFerret\Lib\API\Serializers\DataFields\CharField;
use LeadFerret\Lib\API\Serializers\DataFields\BooleanField;
use LeadFerret\Lib\API\Serializers\DataFields\IPAddressField;
use LeadFerret\Lib\API\Serializers\DataFields\DateTimeField;

/**
 * making the class conrete for testing. 
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @group Serializers
 * @namespace LeadFerret\Lib\API\Serializers
 */
class ArraySerializerConcrete extends ArraySerializer
{
    public function initDataFields()
    {
        $this->addField('status', new CharField());
        $this->addField('server_data', new CharField());
        $this->addField('ip', new IPAddressField());
        $this->addField('you', new CharField());
        $this->addField('stage', new CharField());
        $this->addField('alive', new BooleanField());
        $this->addField('timestamp', new DateTimeField());
    }
}