<?php
namespace Solvire\Tests\API\JSONSchema;

use Solvire\Utilities\OptionsChecker as Ch;
use Solvire\Application\Environment as Ev;
use Solvire\API\JSONSchema\JSONSchemaAppliance;

/**
 *
 *
 *
 * @group JSONSchema
 *
 * @author solvire <info@scotttactical.com>
 * @package JSONSchema
 * @namespace Solvire\API\JSONSchema
 */
class JSONSchemaApplianceTest extends \BaseTestCase
{

    public function testCanCreateBaseFromEnvironment()
    {
        $app = new JSONSchemaAppliance();
        $schema = $app->toSchema();
        
        $this->assertEquals($schema['basePath'], Ev::get('API_BASE_PATH'));
        $this->assertEquals($schema['baseUrl'], Ev::get('API_BASE_URL'));
        $this->assertEquals($schema['name'], Ev::get('APPLICATION_NAME'));
        $this->assertEquals($schema['version'], Ev::get('API_VERSION'));
        
        // yes this is hard coded for now - a little catch all just in case
        $this->assertEquals($schema['$schema'], 'http://json-schema.org/draft-04/schema#');
    }

    public function testCanCreateBaseFromOptionsArray()
    {
        $options = [
            'id' => "anID",
            'baseUrl' => 'http://options.com/',
            'basePath' => 'oops/',
            'documentationUrl' => Ev::get('API_BASE_URL'),
            'version' => 'v2.0',
            'description' => 'created from array'
        ];
        
        $app = new JSONSchemaAppliance($options);
        $this->assertTrue($app->allSet());
        $schema = $app->toSchema();
        
        $this->assertEquals($schema['basePath'], $options['basePath']);
        $this->assertEquals($schema['baseUrl'], $options['baseUrl']);
        $this->assertEquals($schema['version'], $options['version']);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testCannotCreateSchemaWithoutBaseComplete()
    {
        $options = [
            'id' => "anID",
            'baseUrl' => 'http://options.com/',
            'basePath' => 'oops/',
            'description' => ''
        ];
        
        $app = new JSONSchemaAppliance($options);
        
        try {
            $this->assertFalse($app->allSet());
        } catch (\RuntimeException $e) {
            $this->assertTrue(true);
        }
        $schema = $app->toSchema();
        
    }
}
