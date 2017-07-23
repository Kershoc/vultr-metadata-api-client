# vultr-metadata-api-client

## Table of Contents

* [Metadata](#vultrmetadata)
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
    * [getNicAdditionalIpv4Address](#getnicadditionalipv4address)
    * [getNicAdditionalIpv4Netmask](#getnicadditionalipv4netmask)
    * [getNicAdditionalIpv6Network](#getnicadditionalipv6network)
    * [getNicAdditionalIpv6Prefix](#getnicadditionalipv6prefix)

## \Vultr\Metadata

Class Metadata



* Full name: \Vultr\Metadata


### getAll

All Metadata

```php
\Vultr\Metadata::getAll(  ): mixed
```





**Return Value:**

Entire metadata tree converted from APIs JSON response


**See Also:**

* https://www.vultr.com/metadata/#v1_json 

---

### getAllJson

All Metadata as JSON

```php
\Vultr\Metadata::getAllJson(  ): boolean|string
```





**Return Value:**

Entire metadata tree as a JSON document.


**See Also:**

* https://www.vultr.com/metadata/#v1_json 

---

### getHostname

VM Hostname

```php
\Vultr\Metadata::getHostname(  ): boolean|string
```





**Return Value:**

Default hostname of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_hostname 

---

### getInstanceId

Instance ID

```php
\Vultr\Metadata::getInstanceId(  ): boolean|string
```





**Return Value:**

Instance ID of calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_instanceid 

---

### getPublicKeys

Public Keys

```php
\Vultr\Metadata::getPublicKeys(  ): boolean|string
```





**Return Value:**

Public SSH keys associated with calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_public_keys 

---

### getRegionCode

Region Code

```php
\Vultr\Metadata::getRegionCode(  ): boolean|string
```





**Return Value:**

Region code of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_region_regioncode 

---

### getBgpPeerAsn

BGP Peer ASN

```php
\Vultr\Metadata::getBgpPeerAsn( integer $ipv = 4 ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

BGP ASN of the peer (Vultr).


**See Also:**

* https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_asn 
* https://www.vultr.com/metadata/#v1_bgp_ipv6_peer_asn 

---

### getBgpPeerAddress

BGP Peer Address

```php
\Vultr\Metadata::getBgpPeerAddress( integer $ipv = 4 ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

BGP IPv4 address of the calling VM.


**See Also:**

* https://www.vultr.com/metadata/#v1_bgp_ipv4_peer_address 
* https://www.vultr.com/metadata/#v1_bgp_ipv6_peer_address 

---

### getBgpMyAsn

BGP My ASN

```php
\Vultr\Metadata::getBgpMyAsn( integer $ipv = 4 ): boolean|string
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
\Vultr\Metadata::getBgpMyAddress( integer $ipv = 4 ): boolean|string
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
\Vultr\Metadata::getNics(  ): array
```





**Return Value:**

interface ids as ints.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces 

---

### getNicsAdditional

Additional Network Addresses

```php
\Vultr\Metadata::getNicsAdditional( integer $interfaceId, integer $ipv = 4 ): array
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |
| `$ipv` | **integer** | IP version. Allowable values: 4 &#124;&#124; 6, default 4 |


**Return Value:**

interface ids as ints.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional 
* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional 

---

### getNicNetworkType

Interface Network Type

```php
\Vultr\Metadata::getNicNetworkType( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

Network type of the specified interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_network_type 

---

### getNicMac

Interface MAC

```php
\Vultr\Metadata::getNicMac( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

MAC address of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_mac 

---

### getNicIpv4Address

Interface IPv4 Address

```php
\Vultr\Metadata::getNicIpv4Address( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

IPv4 address of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_address 

---

### getNicIpv4Gateway

Interface IPv4 Gateway

```php
\Vultr\Metadata::getNicIpv4Gateway( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

IPv4 gateway of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_gateway 

---

### getNicIpv4Netmask

Interface IPv4 Netmask

```php
\Vultr\Metadata::getNicIpv4Netmask( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

IPv4 netmask of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_netmask 

---

### getNicIpv6Network

Interface IPv6 Network

```php
\Vultr\Metadata::getNicIpv6Network( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

IPv6 network of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_network 

---

### getNicIpv6Prefix

Interface IPv6 Prefix

```php
\Vultr\Metadata::getNicIpv6Prefix( integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$interfaceId` | **integer** | Primary network interface to query |


**Return Value:**

IPv6 prefix of the specified network interface.


**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_prefix 

---

### getNicAdditionalIpv4Address

Interface Additional IPv4 Address

```php
\Vultr\Metadata::getNicAdditionalIpv4Address( integer $primaryInterfaceId, integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceId` | **integer** | Parent network interface to query |
| `$interfaceId` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_address 

---

### getNicAdditionalIpv4Netmask

Interface Additional IPv4 Netmask

```php
\Vultr\Metadata::getNicAdditionalIpv4Netmask( integer $primaryInterfaceId, integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceId` | **integer** | Parent network interface to query |
| `$interfaceId` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv4_additional_0_netmask 

---

### getNicAdditionalIpv6Network

Interface Additional IPv6 Network

```php
\Vultr\Metadata::getNicAdditionalIpv6Network( integer $primaryInterfaceId, integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceId` | **integer** | Parent network interface to query |
| `$interfaceId` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_network 

---

### getNicAdditionalIpv6Prefix

Interface Additional IPv6 Prefix

```php
\Vultr\Metadata::getNicAdditionalIpv6Prefix( integer $primaryInterfaceId, integer $interfaceId ): boolean|string
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$primaryInterfaceId` | **integer** | Parent network interface to query |
| `$interfaceId` | **integer** | Child network interface to query |



**See Also:**

* https://www.vultr.com/metadata/#v1_interfaces_0_ipv6_additional_0_prefix 

---



--------
> This document was automatically generated from source code comments on 2017-07-16 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
