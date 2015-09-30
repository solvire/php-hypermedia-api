<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\Utilities\OptionsChecker as Ch;

/**
 * 
 * With nested objects we need to reuse some of the serializers. 
 * If we tack on a serializer field we can attach this serializer to it. 
 * Not sure if this can scale indefinitely downward 
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class SerializerField extends DataField
{

    protected $requiredFields = [
        'serializer',
        'callback',
    ];

    /**
     * @var \League\Fractal\SerializerAbstract $serializer 
     */
    protected $serializer = null;
    
    /**
     * @var closure 
     */
    protected $callback = null;

    /**
     * 
     *
     * @param array $options            
     */
    public function __construct($options)
    {
        Ch::ek($options, $this->requiredFields);
        $this->serializer = $options['serializer'];
        $this->callback = $options['callback'];
        
        // make sure that the serializer is set up properly 
        if(! $this->serializer instanceof \Solvire\API\Serializers\BaseSerializer)
        {
            throw new \RuntimeException("Your serializer must be of type Solvire\API\Serializers\BaseSerializer ");
        }
        
        parent::__construct($options);
    }

    /**
     * 
     * @return object \Solvire\API\Serializers\BaseSerializer
     */
    public function getSerializer()
    {
        return $this->serializer;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Solvire\API\Serializers\DataFields\DataField::getData()
     */
    public function getData()
    {
        return $this->serializer->loadData($this->data);
    }
    
    /**
     * 
     * @param Model $model
     */
    public function setData($model)
    {
        $cb = $this->callback;
        $this->data = $cb($model);
    }
    
}
