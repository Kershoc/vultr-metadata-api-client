<?php
/**
 * Vultr.com Metadata API Client
 * @package VultrMetadata
 * @version 1.5
 * @see https://github.com/kershoc/vultr-metadata-api-client
 * @author Symeon Quimby https://github.com/kershoc
 * @license https://opensource.org/licenses/MIT MIT
 */
namespace Vultr;

/**
 * Class Metadata
 */
class Metadata
{
    /**
     * Api Endpoint
     * @var string
     * @see https://www.vultr.com/metadata/
     */
    private static $endpoint = 'http://169.254.169.254/v1';

    /**
     * @var array
     * Simple in memory cache for valid api responses
     * Key: Endpoint Method
     * Value: API response
     */
    private static $cache = [];


    /**
     * All Metadata
     * @return mixed Entire metadata tree converted from APIs JSON response
     * @see https://www.vultr.com/metadata/#v1_json
     */
    public function getAll()
    {
        return json_decode(self::getAllJson());
    }

    /**
     * All Metadata as JSON
     * @return bool|string Entire metadata tree as a JSON document.
     * @see https://www.vultr.com/metadata/#v1_json
     */
    public function getAllJson()
    {
        return self::query('.json');
    }

    /**
     * VM Hostname
     * @return bool|string Default hostname of the calling VM.
     * @see https://www.vultr.com/metadata/#v1_hostname
     */
    public function getHostname()
    {
        return self::query('/hostname');
    }

    /**
     * Instance ID
     * @return bool|string Instance ID of calling VM.
     * @see https://www.vultr.com/metadata/#v1_instanceid
     */
    public function getInstanceId()
    {
        return self::query('/instanceid');
    }

    /**
     * Public Keys
     * @return bool|string Public SSH keys associated with calling VM.
     * @see https://www.vultr.com/metadata/#v1_public_keys
     */
    public function getPublicKeys()
    {
        return self::query('/public-keys');
    }

    /**
     * Region Code
     * @return bool|string  Region code of the calling VM.
     * @see https://www.vultr.com/metadata/#v1_region_regioncode
     */
    public function getRegionCode()
    {
        return self::query('/region/regioncode');
    }

    /**
     * BGP Peer ASN
     * @param int $ipv IP version. Allowable values: 4 || 6, default 4
     * @return bool|string BGP ASN of the peer (Vultr).
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_asn
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv6_peer_asn
     */
    public function getBgpPeerAsn(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/peer-asn");
    }

    /**
     * BGP Peer Address
     * @param int $ipv IP version. Allowable values: 4 || 6, default 4
     * @return bool|string BGP IPv4 address of the calling VM.
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_address
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv6_peer_address
     */
    public function getBgpPeerAddress(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/peer-address");
    }

    /**
     * BGP My ASN
     * @param int $ipv IP version. Allowable values: 4 || 6, default 4
     * @return bool|string BGP ASN of the calling VM.
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_my_asn
     */
    public function getBgpMyAsn(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/my-asn");
    }

    /**
     * BGP My Address
     * @param int $ipv IP version. Allowable values: 4 || 6, default 4
     * @return bool|string BGP IP address of the calling VM.
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_my_address
     */
    public function getBgpMyAddress(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/my-address");
    }

    /**
     * Network Interfaces
     * @return array interface ids as ints.
     * @see https://www.vultr.com/metadata/#v1_interfaces
     */
    public function getNics()
    {
        $interfaces = self::query("/interfaces/");
        return self::parseNics($interfaces);
    }

    /**
     * Additional Network Addresses
     * @param int $interfaceId Primary network interface to query
     * @param int $ipv IP version. Allowable values: 4 || 6, default 4
     * @return array interface ids as ints.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional
     */
    public function getNicsAdditional(int $interfaceId, int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        $interfaces = self::query("/interfaces/{$interfaceId}/ipv{$ipv}/additional/");
        return self::parseNics($interfaces);
    }


    /**
     * Interface Network Type
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string Network type of the specified interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_network_type
     */
    public function getNicNetworkType(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/network-type");
    }

    /**
     * Interface MAC
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string  MAC address of the specified network interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_mac
     */
    public function getNicMac(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/mac");
    }

    /**
     * Interface IPv4 Address
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string  IPv4 address of the specified network interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_address
     */
    public function getNicIpv4Address(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/ipv4/address");
    }

    /**
     * Interface IPv4 Gateway
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string  IPv4 gateway of the specified network interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_gateway
     */
    public function getNicIpv4Gateway(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/ipv4/gateway");
    }

    /**
     * Interface IPv4 Netmask
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string  IPv4 netmask of the specified network interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_netmask
     */
    public function getNicIpv4Netmask(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/ipv4/netmask");
    }

    /**
     * Interface IPv6 Network
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string  IPv6 network of the specified network interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_network
     */
    public function getNicIpv6Network(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/ipv6/network");
    }

    /**
     * Interface IPv6 Prefix
     * @param int $interfaceId  Primary network interface to query
     * @return bool|string  IPv6 prefix of the specified network interface.
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_prefix
     */
    public function getNicIpv6Prefix(int $interfaceId)
    {
        return self::query("/interfaces/{$interfaceId}/ipv6/prefix");
    }

    /**
     * Interface Additional IPv4 Address
     * @param int $primaryInterfaceId  Parent network interface to query
     * @param int $interfaceId  Child network interface to query
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_address
     */
    public function getNicAdditionalIpv4Address(int $primaryInterfaceId, int $interfaceId)
    {
        return self::query("/interfaces/{$primaryInterfaceId}/ipv4/additional/{$interfaceId}/address");
    }

    /**
     * Interface Additional IPv4 Netmask
     * @param int $primaryInterfaceId  Parent network interface to query
     * @param int $interfaceId  Child network interface to query
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_netmask
     */
    public function getNicAdditionalIpv4Netmask(int $primaryInterfaceId, int $interfaceId)
    {
        return self::query("/interfaces/{$primaryInterfaceId}/ipv4/additional/{$interfaceId}/netmask");
    }

    /**
     * Interface Additional IPv6 Network
     * @param int $primaryInterfaceId  Parent network interface to query
     * @param int $interfaceId  Child network interface to query
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_network
     */
    public function getNicAdditionalIpv6Network(int $primaryInterfaceId, int $interfaceId)
    {
        return self::query("/interfaces/{$primaryInterfaceId}/ipv6/additional/{$interfaceId}/network");
    }

    /**
     * Interface Additional IPv6 Prefix
     * @param int $primaryInterfaceId  Parent network interface to query
     * @param int $interfaceId  Child network interface to query
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_prefix
     */
    public function getNicAdditionalIpv6Prefix(int $primaryInterfaceId, int $interfaceId)
    {
        return self::query("/interfaces/{$primaryInterfaceId}/ipv6/additional/{$interfaceId}/prefix");
    }


    /**
     * Query API Endpoint
     * @param string $method method portion of uri
     * @return bool|string API result
     */
    protected function query(string $method)
    {
        if($data = self::queryCache($method)){
            return $data;
        }

        $result = file_get_contents(self::$endpoint . $method);
        self::isApiError($http_response_header);
        self::saveToCache($method, $result);
        return $result;
    }

    /**
     * API Error Handling
     * @param array $headers Magic $http_response_header set by streams http wrapper
     * @throws \Exception if empty response headers
     * @throws \Exception if invalid location
     * @throws \Exception if invalid HTTP method
     * @throws \Exception if internal server error
     * @throws \Exception if service unavailable
     */
    private function isApiError(array $headers)
    {
        if (empty($headers)) {
            throw new \Exception("No Headers Received.  Check your connection and try again.");
        }
        $matches = [];
        preg_match('#HTTP/\d+\.\d+ (\d+)#', $headers[0], $matches);
        switch ($matches[1]) :
            case 404:
                throw new \Exception("Invalid location. Check the URL that you are using.");
                break;
            case 405:
                throw new \Exception("Invalid HTTP method. Check that the method (POST|GET) matches what the documentation indicates.");
                break;
            case 500:
                throw new \Exception("Internal server error. Try again at a later time.");
                break;
            case 503:
                throw new \Exception("Service is currently unavailable. Try your request again later.");
                break;
            default:
                break;
        endswitch;
    }

    /**
     * Parse Nics
     * Convert Interface lists returned by api into array of ints.
     * @param string $list Newline separated list returned by interface index api calls
     * @return array Interface Ids as ints for use in getNic... calls requiring an instance id
     */
    private function parseNics(string $list)
    {
        return array_map(
            function ($x) {
                return (int) trim($x, "/");
            },
            array_diff(explode("\n", $list), [null])
        );
    }


    private function queryCache(string $method)
    {
        if(array_key_exists($method, self::$cache)){
            return self::$cache[$method];
        }
        return false;
    }

    private function saveToCache($method, $data)
    {
        self::$cache[$method] = $data;
    }
}
