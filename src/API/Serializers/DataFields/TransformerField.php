<?php
namespace Solvire\API\Serializers\DataFields;

use Solvire\Utilities\OptionsChecker as Ch;

/**
 * 
 * I think some fields are not easily mappable. I have a feeling this kind of thing will be needed a lot. 
 * My first example was changing a columnar data set into a row based set with mappings
 *
 * @see /examples for the transformer 
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class TransformerField extends DataField
{

    protected $requiredFields = [
        'transformer',
        'callback'
    ];

    /**
     * @var \League\Fractal\TransformerAbstract $transformer 
     */
    protected $transformer = null;
    
    /**
     * 
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
        $this->transformer = $options['transformer'];
        $this->callback = $options['callback'];
        
        // make sure that the transformer is set up properly 
        if(! $this->transformer instanceof \League\Fractal\TransformerAbstract)
        {
            throw new \RuntimeException("Your transformer must be of type League\Fractal\TransformerAbstract on " . $this->name );
        }
        
        if(!method_exists($this->transformer, 'transform'))
        {
            throw new \RuntimeException("Your transformer must implement the transform function ");
        }
        
        parent::__construct($options);
    }

    /**
     * 
     * @return object \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return $this->transformer;
    }
    
    /**
     * (non-PHPdoc)
     * @see \Solvire\API\Serializers\DataFields\DataField::getData()
     */
    public function getData()
    {
        return $this->transformer->transform($this->data);
    }
    
    
    /**
     *
     * @param Model $model
     */
    public function setData($model)
    {
        $cb = $this->callback;
        $this->data = $cb($model);
        return $this;
    }    

    
}
