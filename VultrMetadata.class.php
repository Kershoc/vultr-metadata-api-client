<?php
/**
 * @package VultrMetadata
 * @version 1.0
 * @see https://github.com/kershoc/vultr-metadata-api-client
 * @author Symeon Quimby https://github.com/kershoc
 * @license https://opensource.org/licenses/MIT MIT
 */

class VultrMetadata
{
    /**
     * @var string
     * @see https://www.vultr.com/metadata/
     */
    public $endpoint = 'http://169.254.169.254/v1';


    /**
     * @return mixed
     * @see https://www.vultr.com/metadata/#v1_json
     */
    public function getAll()
    {
        return json_decode($this->getAllJson());
    }

    /**
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_json
     */
    public function getAllJson()
    {
        return self::query('.json');
    }

    /**
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_hostname
     */
    public function getHostname()
    {
        return self::query('/hostname');
    }

    /**
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_instanceid
     */
    public function getInstanceId()
    {
        return self::query('/instanceid');
    }

    /**
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_public_keys
     */
    public function getPublicKeys()
    {
        return self::query('/public-keys');
    }

    /**
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_region_regioncode
     */
    public function getRegionCode()
    {
        return self::query('/region/regioncode');
    }

    /**
     * @param int $ipv
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_asn
     */
    public function getBgpPeerAsn(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/peer-asn");
    }

    /**
     * @param int $ipv
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_address
     */
    public function getBgpPeerAddress(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/peer-address");
    }

    /**
     * @param int $ipv
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_my_asn
     */
    public function getBgpMyAsn(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/my-asn");
    }

    /**
     * @param int $ipv
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_bgp_ipv4_my_address
     */
    public function getBgpMyAddress(int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        return self::query("/bgp/ipv{$ipv}/my-address");
    }

    /**
     * @return array
     * @see https://www.vultr.com/metadata/#v1_interfaces
     */
    public function getNics()
    {
        $interfaces = self::query("/interfaces/");
        return self::parseNics($interfaces);
    }

    /**
     * @param int $interfaceid
     * @param int $ipv
     * @return array
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional
     */
    public function getNicsAdditional(int $interfaceid, int $ipv = 4)
    {
        ($ipv === 6) ?: $ipv = 4;
        $interfaces = self::query("/interfaces/{$interfaceid}/ipv{$ipv}/additional/");
        return self::parseNics($interfaces);
    }


    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_network_type
     */
    public function getNicNetworkType(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/network-type");
    }

    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_mac
     */
    public function getNicMac(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/mac");
    }

    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_address
     */
    public function getNicIpv4Address(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/ipv4/address");
    }

    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_gateway
     */
    public function getNicIpv4Gateway(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/ipv4/gateway");
    }

    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_netmask
     */
    public function getNicIpv4Netmask(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/ipv4/netmask");
    }

    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_network
     */
    public function getNicIpv6Network(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/ipv6/network");
    }

    /**
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_prefix
     */
    public function getNicIpv6Prefix(int $interfaceid)
    {
        return self::query("/interfaces/{$interfaceid}/ipv6/prefix");
    }

    /**
     * @param int $primaryInterfaceid
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_address
     */
    public function GetNicAdditionalIpv4Address(int $primaryInterfaceid, int $interfaceid)
    {
        return self::query("/interfaces/{$primaryInterfaceid}/ipv4/additional/{$interfaceid}/address");
    }

    /**
     * @param int $primaryInterfaceid
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_netmask
     */
    public function GetNicAdditionalIpv4Netmask(int $primaryInterfaceid, int $interfaceid)
    {
        return self::query("/interfaces/{$primaryInterfaceid}/ipv4/additional/{$interfaceid}/netmask");
    }

    /**
     * @param int $primaryInterfaceid
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_network
     */
    public function GetNicAdditionalIpv6Network(int $primaryInterfaceid, int $interfaceid)
    {
        return self::query("/interfaces/{$primaryInterfaceid}/ipv6/additional/{$interfaceid}/network");
    }

    /**
     * @param int $primaryInterfaceid
     * @param int $interfaceid
     * @return bool|string
     * @see https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_prefix
     */
    public function GetNicAdditionalIpv6Prefix(int $primaryInterfaceid, int $interfaceid)
    {
        return self::query("/interfaces/{$primaryInterfaceid}/ipv6/additional/{$interfaceid}/prefix");
    }


    /**
     * @param string $method
     * @return bool|string
     */
    protected function query(string $method)
    {
        $result = file_get_contents($this->endpoint . $method);
        self::isApiError($http_response_header);
        return $result;
    }

    /**
     * @param array $headers Magic $http_response_headers set by streams http wrapper
     * @throws ErrorException
     */
    private function isApiError(array $headers)
    {
        if (empty($headers)) {
            throw new ErrorException("No Headers Received.  Check your connection and try again.");
        }
        $matches = [];
        preg_match('#HTTP/\d+\.\d+ (\d+)#', $headers[0], $matches);
        switch ($matches[1]) :
            case (404):
                throw new ErrorException("Invalid location. Check the URL that you are using.");
                break;
            case (405):
                throw new ErrorException("Invalid HTTP method. Check that the method (POST|GET) matches what the documentation indicates.");
                break;
            case (500):
                throw new ErrorException("Internal server error. Try again at a later time.");
                break;
            case (503):
                throw new ErrorException("Service is currently unavailable. Try your request again later.");
                break;
            default:
                break;
        endswitch;
    }

    /**
     * @param string $list Newline separated list returned by index api calls
     * @return array
     */
    private function explodeList(string $list)
    {
        return explode("\n", $list);
    }

    /**
     * @param string $list Newline separated list returned by interface index api calls
     * @return array Interface Ids as ints for use in getNic... calls requiring an instance id
     */
    private function parseNics(string $list)
    {
        return array_map(
            function ($x) {
                return (int) trim($x, "/");
            },
            array_diff(self::explodeList($list), [null])
        );
    }
}
