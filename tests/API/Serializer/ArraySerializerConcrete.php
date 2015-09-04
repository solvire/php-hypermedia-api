<?php
namespace Solvire\API\Serializers;

use Solvire\API\Serializers\DataFields\CharField;
use Solvire\API\Serializers\DataFields\BooleanField;
use Solvire\API\Serializers\DataFields\IPAddressField;
use Solvire\API\Serializers\DataFields\DateTimeField;

/**
 * making the class conrete for testing.
 *
 * @group Serializers
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\API\Serializers
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