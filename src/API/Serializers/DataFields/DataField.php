<?php
namespace Solvire\API\Serializers\DataFields;

/**
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
abstract class DataField
{

    /**
     * holder for the data linked to this object
     *
     * @var mixed
     */
    protected $data = null;

    protected $name = null;

    protected $columnName = null;

    protected $readOnly = false;

    protected $writeOnly = false;

    protected $required = false;

    protected $allowNull = false;

    protected $defaultValue = null;

    protected $initial = null;

    protected $label = null;

    protected $helpText = null;

    protected $style = null;

    protected $errorMessages = null;

    protected $validators = null;

    protected $requiredFields = [];

    protected $cast = null;

    protected $castTypes = [
        'string',
        'integer',
        'object'
    ];

    protected $fillable = [
        'readOnly',
        'writeOnly',
        'required',
        'allowNull',
        'defaultValue',
        'initial',
        'label',
        'helpText',
        'style',
        'errorMessages',
        'validators'
    ];

    protected $castOptions = [
        'string',
        'integer',
        'datetime',
        'time'
    ];

    /**
     *
     * @param array $options            
     */
    public function __construct(array $options = [])
    {
        if (isset($options['columnName']))
            $this->columnName = $options['columnName'];
        if (isset($options['readOnly']))
            $this->readOnly = $options['readOnly'];
        if (isset($options['writeOnly']))
            $this->writeOnly = $options['writeOnly'];
        if (isset($options['required']))
            $this->required = $options['required'];
        if (isset($options['allowNull']))
            $this->allowNull = $options['allowNull'];
        if (isset($options['defaultValue']))
            $this->defaultValue = $options['defaultValue'];
        if (isset($options['initial']))
            $this->initial = $options['initial'];
        if (isset($options['label']))
            $this->label = $options['label'];
        if (isset($options['helpText']))
            $this->helpText = $options['helpText'];
        if (isset($options['style']))
            $this->style = $options['style'];
        if (isset($options['validators']))
            $this->validators = $options['validators'];
            
            // optionally we can store the name interally
        if (isset($options['name']))
            $this->name = $options['name'];
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public abstract function setData($data);

    /**
     * returns the data in the most usable format
     */
    public abstract function getData();

    /**
     * returns the data in a format that is probably most storable
     */
    public function getRaw()
    {
        return $this->data;
    }

    public function columnName()
    {
        return $this->columnName;
    }

    public function readOnly()
    {
        return (boolean) $this->readOnly;
    }

    public function writeOnly()
    {
        return (boolean) $this->writeOnly;
    }

    public function required()
    {
        return (boolean) $this->required;
    }

    public function allowNull()
    {
        return (boolean) $this->allowNull;
    }

    public function defaultValue()
    {
        return $this->defaultValue;
    }

    public function initial()
    {
        return $this->initial;
    }

    public function label()
    {
        return $this->label;
    }

    public function helpText()
    {
        return $this->helpText;
    }

    public function style()
    {
        return $this->style;
    }

    public function setErrorMessages($messages)
    {
        if (! is_array($messages))
            throw new \RuntimeExcpeiotn("The eerror message should be ot type array.");
        $this->errorMessages = $messages;
    }

    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

    public function validators()
    {
        return $this->validators;
    }
}