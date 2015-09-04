<?php
namespace Solvire\API\Serializers\DataFields;

/**
 * IP Address is stored as a binary structure.
 *
 *
 * @group DataFields
 *
 * @see http://php.net/manual/en/function.inet-pton.php
 * @see http://php.net/manual/en/function.inet-ntop.php
 * @author solvire <stevenjscott@gmail.com>
 * @package DataFields
 * @namespace Solvire\API\Serializers\DataFields
 */
class IPAddressFieldTest extends \BaseTestCase
{

    /**
     */
    public function testCanSetIPAddressFieldData()
    {
        $ipv4 = '192.168.1.12';
        $ipv6 = '2602:306:83cf:5d80:39c5:4ad2:5f9f:bcea';
        
        $ip = new IPAddressField();
        
        $ip->setData($ipv4);
        $this->assertEquals($ip->getData(), $ipv4);
        
        $ip->setData($ipv6);
        $this->assertEquals($ip->getData(), $ipv6);
    }
}
