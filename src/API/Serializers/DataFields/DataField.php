<?php
namespace Solvire\API\Serializers\DataFields;

/**
 *
 * @author solvire <info@scotttactical.com>
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
    
    protected $allowEmpty = false;

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
        'datetime',
        'time',
        'object'
    ];

    protected $fillable = [
        'name',
        'columnName',
        'readOnly',
        'writeOnly',
        'required',
        'allowNull',
        'allowEmpty',
        'defaultValue',
        'initial',
        'label',
        'helpText',
        'style',
        'validators'
    ];

    /**
     *
     * @param array $options            
     */
    public function __construct(array $options = [])
    {
        $this->loadOptions($options);
    }

    /**
     *
     * @param array $options            
     */
    protected function loadOptions($options)
    {
        foreach ($this->fillable as $key) {
            if (isset($options[$key]))
                $this->$key = $options[$key];
        }
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

    abstract public function setData($data);

    /**
     * returns the data in the most usable format
     */
    abstract public function getData();

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
    
    public function allowEmpty()
    {
        return (boolean) $this->allowEmpty;
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