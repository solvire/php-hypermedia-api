<?php
namespace Solvire\Tests\API\Serializers;

use Solvire\API\Serializers\DataFields\CharField;
use Solvire\API\Serializers\DataFields\DateTimeField;
use Solvire\API\Serializers\ArraySerializer;

/**
 * making the class conrete for testing.
 *
 * @group Serializers
 *
 * @author solvire <info@scotttactical.com>
 * @package Serializers
 * @namespace Solvire\Tests\API\Serializers
 */
class ArraySerializerConcrete extends ArraySerializer
{

    public function initDataFields()
    {
        $this->addField('status', new CharField());
        $this->addField('timestamp', new DateTimeField());
    }
}