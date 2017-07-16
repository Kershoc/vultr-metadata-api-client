# vultr-metadata-api-client

## Table of Contents

* [VultrMetadata](#vultrmetadata)
    * [getAll](#getall)
    * [getAllJson](#getalljson)
    * [getHostname](#gethostname)
    * [getInstanceId](#getinstanceid)
    * [getPublicKeys](#getpublickeys)
    * [getRegionCode](#getregioncode)
    * [getBgpPeerAsn](#getbgppeerasn)
    * [getBgpPeerAddress](#getbgppeeraddress)
    * [getBgpMyAsn](#getbgpmyasn)
    * [getBgpMyAddress](#getbgpmyaddress)
    * [getNics](#getnics)
    * [getNicsAdditional](#getnicsadditional)
    * [getNicNetworkType](#getnicnetworktype)
    * [getNicMac](#getnicmac)
    * [getNicIpv4Address](#getnicipv4address)
    * [getNicIpv4Gateway](#getnicipv4gateway)
    * [getNicIpv4Netmask](#getnicipv4netmask)
    * [getNicIpv6Network](#getnicipv6network)
    * [getNicIpv6Prefix](#getnicipv6prefix)
    * [GetNicAdditionalIpv4Address](#getnicadditionalipv4address)
    * [GetNicAdditionalIpv4Netmask](#getnicadditionalipv4netmask)
    * [GetNicAdditionalIpv6Network](#getnicadditionalipv6network)
    * [GetNicAdditionalIpv6Prefix](#getnicadditionalipv6prefix)

## VultrMetadata

Class VultrMetadata



* Full name: \VultrMetadata


### getAll

All Metadata

```php
VultrMetadata::getAll(  ): mixed
```





**Return Value:**

Entire metadata tree converted from APIs JSON response


**See Also:**

* https://www.vultr.com/metadata/#v1_json 

---

### getAllJson

All Metadata as JSON

```php
VultrMetadata::getAllJson(  ): boolean|string
```





**Return Value:**

Entire metadata tree as a JSON document.


**See Also:**

* https://www.vultr.com/metadata/#v1_json 

---

### getHostname

VM Hostname

```php
VultrMetadata::getHostname(  ): boolean|string
```





**Return Value:**

Default hostname of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_hostname 

---

### getInstanceId

Instance ID

```php
VultrMetadata::getInstanceId(  ): boolean|string
```





**Return Value:**

Instance ID of calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_instanceid 

---

### getPublicKeys

Public Keys

```php
VultrMetadata::getPublicKeys(  ): boolean|string
```





**Return Value:**

Public SSH keys associated with calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_public_keys 

---

### getRegionCode

Region Code

```php
VultrMetadata::getRegionCode(  ): boolean|string
```





**Return Value:**

Region code of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_region_regioncode 

---

### getBgpPeerAsn

BGP Peer ASN

```php
VultrMetadata::getBgpPeerAsn( integer $ipv = 4 ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

BGP ASN of the peer (Vultr).


**See Also:**

* https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_asn * https://www.vultr.com/metadata/#v1_bgp_ipv6_peer_asn 

---

### getBgpPeerAddress

BGP Peer Address

```php
VultrMetadata::getBgpPeerAddress( integer $ipv = 4 ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

BGP IPv4 address of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_address * https://www.vultr.com/metadata/#v1_bgp_ipv6_peer_address 

---

### getBgpMyAsn

BGP My ASN

```php
VultrMetadata::getBgpMyAsn( integer $ipv = 4 ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

BGP ASN of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_bgp_ipv4_my_asn 

---

### getBgpMyAddress

BGP My Address

```php
VultrMetadata::getBgpMyAddress( integer $ipv = 4 ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

BGP IP address of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_bgp_ipv4_my_address 

---

### getNics

Network Interfaces

```php
VultrMetadata::getNics(  ): array
```





**Return Value:**

interface ids as ints.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces 

---

### getNicsAdditional

Additional Network Addresses

```php
VultrMetadata::getNicsAdditional( integer $interfaceid, integer $ipv = 4 ): array
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

interface ids as ints.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional * https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional 

---

### getNicNetworkType

Interface Network Type

```php
VultrMetadata::getNicNetworkType( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

Network type of the specified interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_network_type 

---

### getNicMac

Interface MAC

```php
VultrMetadata::getNicMac( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

MAC address of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_mac 

---

### getNicIpv4Address

Interface IPv4 Address

```php
VultrMetadata::getNicIpv4Address( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

IPv4 address of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_address 

---

### getNicIpv4Gateway

Interface IPv4 Gateway

```php
VultrMetadata::getNicIpv4Gateway( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

IPv4 gateway of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_gateway 

---

### getNicIpv4Netmask

Interface IPv4 Netmask

```php
VultrMetadata::getNicIpv4Netmask( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

IPv4 netmask of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_netmask 

---

### getNicIpv6Network

Interface IPv6 Network

```php
VultrMetadata::getNicIpv6Network( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

IPv6 network of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_network 

---

### getNicIpv6Prefix

Interface IPv6 Prefix

```php
VultrMetadata::getNicIpv6Prefix( integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceid` | **integer** | Primary network interface to query |


**Return Value:**

IPv6 prefix of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_prefix 

---

### GetNicAdditionalIpv4Address

Interface Additional IPv4 Address

```php
VultrMetadata::GetNicAdditionalIpv4Address( integer $primaryInterfaceid, integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceid` | **integer** | Parent network interface to query |
| `$interfaceid` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_address 

---

### GetNicAdditionalIpv4Netmask

Interface Additional IPv4 Netmask

```php
VultrMetadata::GetNicAdditionalIpv4Netmask( integer $primaryInterfaceid, integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceid` | **integer** | Parent network interface to query |
| `$interfaceid` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_netmask 

---

### GetNicAdditionalIpv6Network

Interface Additional IPv6 Network

```php
VultrMetadata::GetNicAdditionalIpv6Network( integer $primaryInterfaceid, integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceid` | **integer** | Parent network interface to query |
| `$interfaceid` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_network 

---

### GetNicAdditionalIpv6Prefix

Interface Additional IPv6 Prefix

```php
VultrMetadata::GetNicAdditionalIpv6Prefix( integer $primaryInterfaceid, integer $interfaceid ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceid` | **integer** | Parent network interface to query |
| `$interfaceid` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_prefix 

---



--------
> This document was automatically generated from source code comments on 2017-07-16 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
