<?php
namespace Solvire\API\Serializers;

use Solvire\API\Serializers\DataFields\DataField;
use Solvire\API\Serializers\DataFields\DataFieldCollection;

/**
 *
 * @see README.md
 * @author solvire <stevenjscott@gmail.com>
 * @package Serializers
 * @namespace Solvire\API\Serializers
 */
abstract class BaseSerializer implements \JsonSerializable
{

    /**
     * borrowed
     *
     * @var unknown
     */
    protected $arguments = [
        'read_only',
        'write_only',
        'required',
        'default',
        'initial',
        'source',
        'label',
        'help_text',
        'style',
        'error_messages',
        'allow_empty',
        'instance',
        'data',
        'partial',
        'context',
        'allow_null'
    ];

    /**
     * available methods
     * based on the serializer type
     * should not be settable except from inside the serializer
     *
     * @var unknown
     */
    protected $methods = [];

    protected $fillable = [];

    protected $initialData = [];

    protected $data = [];

    protected $requiredOptions = [];

    /**
     * This is pretty important
     * It is going to hold a list of all the fields and their types.
     * Each one has to get loaded up by factory.
     *
     * Collection of DataFields mapped to field names
     */
    protected $dataFields = null;

    public function __construct($initialData = [])
    {
        $this->dataFields = new DataFieldCollection();
        $this->setInitialData($initialData);
        $this->initDataFields();
    }

    /**
     * this is where your definitions will go.
     */
    abstract public function initDataFields();

    public function setInitialData($initialData)
    {
        $this->initialData = $initialData;
        return $this;
    }

    public function addField($name, DataField $field)
    {
        $field->setName($name);
        $this->dataFields->set($name, $field);
        return $this;
    }

    public function getField($name)
    {
        return $this->dataFields->get($name)->get();
    }

    public function getDataFieldCollection()
    {
        return $this->dataFields;
    }

    /**
     * not the same as fill data - it should prob be depricated
     * 
     * @param unknown $data            
     */
    abstract public function loadData($data);

    /**
     *
     * @throws \RuntimeException
     */
    public function create()
    {
        throw new \RuntimeException('not implemented');
    }

    /**
     *
     * @throws \RuntimeException
     */
    public function update()
    {
        throw new \RuntimeException('not implemented');
    }

    /**
     * should get implemented at the concrete levels
     */
    public function save()
    {
        throw new \RuntimeException('not implemented');
    }

    /**
     * (non-PHPdoc)
     *
     * @see JsonSerializable::jsonSerialize()
     */
    abstract public function jsonSerialize();
}
