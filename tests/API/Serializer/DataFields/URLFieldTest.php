<?php
namespace LeadFerret\Lib\API\Serializers\DataFields;


/**
 * TODO need to find a library that handles url parsing well
 *
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @group DataFields
 * @namespace LeadFerret\Lib\API\Serializers\DataFields
 */
class URLFieldTest extends \GenericTestCase
{
    /**
     * @expectedException \RuntimeException 
     */
    public function testCanSetUrlData()
    {
        $url1 = 'http://google.com';
        $url2 = 'https://test';
        $url3 = 'git@github.com:Respect/Validation.git';
        
        $u = new URLField();
        $u->setData($url1);
        $this->assertEquals($u->getData(), $url1);
        $u->setData($url2);
        $this->assertEquals($u->getData(), $url2);
        $u->setData($url3);
        
    }
    
}
