# InternetBS API PHP Class
PHP to get easy access to all InternetBS reseller API functions

### Supported Features

### Usage Example - Quick Start
Usage of InternetBS Reseller API class is very easy. Just see example below:
--------
```php
include_once('InternetBS.php');

try {

    // Execute command at test server
    if(InternetBS::api()->domainCheck('check-at-test-server.com'))    {
        echo "Domain available!\n";
    } else {
        echo "Domain unavailable!\n";
    }

    // To execute command at live server you just need to set your API key and password.
    // Do it just once and after that all commands will be executed at live server.
    InternetBS::init('MyApiKey', 'mypassword');

    // Now you may execute command at live server
    if(InternetBS::api()->domainCheck('check-at-live-server.org'))    {
        echo "Domain available!\n";
    } else {
        echo "Domain unavailable!\n";
    }

    // Next API command will be also executed at live server
    // For example we may get current registrar prices
    print_r(InternetBS::api()->accountPriceListGet('USD'));

 } catch (Exception $e) {
     echo "OOPS Error: ".$e->getMessage()."\n";
 }
```
--------
That is really simple right? See other examples in "example" and class documentation in "doc" directories.

**NOTE:** command execution at test server taking longer time than at live server

### How to test code in sandbox

### How To Get Real API Key?

### Useful Links
* [InternetBS.net] (http://internetbs.net/?pId=russia) domain registration
* [Official Reseller/Registrar Domain Name API Documentation] (http://internetbs.net/ResellerRegistrarDomainNameAPI/)
* [Ready to use plugins for leading web hosting and billing platforms] (http://internetbs.net/en/domain-name-registrations/domain-automation-plugins-modules.html?pId=russia)
