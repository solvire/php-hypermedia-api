<?php
namespace LeadFerret\Lib\API\JSONSchema;

/**
 * Probably not the best way to deal with this
 * But this represents the auth type.  
 * 
 * @author solvire <stevenjscott@gmail.com>
 * @package JSONSchema
 * @namespace LeadFerret\Lib\API\JSONSchema
 */
class AuthType
{
    
    protected $scopes = null;
    
    /**
     * 
     * @param string $name
     * @param array $scopes
     */
    public function __construct(string $name,array $scopes)
    {
        // TODO need to validate the scopes a little, but for now leave them unlinked 
        $this->scopes = $scopes;
        
    }
    
}
