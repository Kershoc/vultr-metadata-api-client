# vultr-metadata-api-client
![PHP 7+](https://img.shields.io/badge/PHP-7%2B-blue.svg?style=plastic)

API client for Vultr.com Metadata API

Useful for startup or post install scripts to help with first boot setup.  Gather various information about the Vultr.com instance the script is run from.  Only works from a Vultr.com instance.

## Basic Usage

Vultr.com makes the entire metadata available with a single call.
```php
$vultrMeta = new VultrMetadata();
var_dump($vultrMeta->getAll()); // as Object
echo $vultrMeta->getAllJson(); // Raw JSON from api
```

Various methods for querying individual metadata also exist. See [docs](docs/README.md) for list.
```php
echo $vultrMeta->getHostname();
echo $vultrMeta->getInstanceId();
```

## Documentation
[Auto Docs](docs/README.md)