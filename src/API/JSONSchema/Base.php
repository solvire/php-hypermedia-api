<?php
namespace Solvire\API\JSONSchema;

use Solvire\Utilities\OptionsChecker as Ch;
use Solvire\Application as Ev;

/**
 * Base of the schema
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @namespace Solvire\API\JSONSchema
 */
class Base implements Schemable
{

    /**
     * basically application name
     * 
     * @var string $name
     */
    protected $name = null;

    /**
     *
     * @var string
     */
    protected $id = null;

    /**
     *
     * @var string
     */
    protected $version = null;

    /**
     *
     * @var string
     */
    protected $baseUrl = null;

    /**
     *
     * @var string
     */
    protected $basePath = null;

    /**
     *
     * @var string
     */
    protected $documentationUrl = null;

    /**
     *
     * @var string
     */
    protected $description = null;

    /**
     *
     * @var array $mandatoryFields
     */
    protected $mandatoryFields = [
        'id',
        'baseUrl',
        'basePath',
        'documentationUrl',
        'version',
        'description'
    ];

    /**
     *
     * @param array $options            
     */
    public function __construct(array $options = null)
    {
        if (isset($options)) {
            foreach ($options as $key => $value) {
                if (method_exists(self, $key))
                    $this->$key = $value;
            }
        }
    }

    /**
     *
     * @param string $name            
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     *
     * @param string $baseUrl            
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     *
     * @param string $basePath            
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     *
     * @param string $documentationUrl            
     */
    public function setDocumentationUrl($documentationUrl)
    {
        $this->documentationUrl = $documentationUrl;
    }

    /**
     *
     * @param string $description            
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     *
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\JSONSchema\Schemable::allSet()
     * @return s true or blows up
     */
    public function allSet()
    {
        $errors = [];
        foreach ($this->mandatoryFields as $field) {
            if (! isset($this->$field))
                $errors[$field] = "Error the field: $field must be set in Base.";
        }
        
        if (count($errors))
            throw new \Exception('Errors . ' . print_r($errors, 1));
        
        return true;
    }

    /**
     * dish it up
     * (non-PHPdoc)
     * 
     * @see \Solvire\API\JSONSchema\Schemable::toSchema()
     */
    public function toSchema()
    {
        $this->allSet();
        
        return [
            'id' => $this->id,
            'basePath' => $this->basePath,
            'baseUrl' => $this->baseUrl,
            'documentationUrl' => $this->documentationUrl,
            'name' => $this->name,
            '$schema' => 'http://json-schema.org/draft-04/schema#',
            'version' => $this->version,
            'description' => $this->description
        ];
    }
}

