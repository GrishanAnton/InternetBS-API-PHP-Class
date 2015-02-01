# InternetBS-API-PHP-Class
PHP to get easy access to all InternetBS reseller API functions


Supported Features
------------------


Usage Example - Quick Start
---------------------------

```php
include_once('InternetBS.php');

// Execute API call at test server
if(InternetBS::api()->domainCheck('aaa-bbb-ccc-sss.com'))    {
    echo "Domain available!\n";
} else {
    echo "Domain unavailable!\n";
}
```
That is all what you need! See more examples in "example" directory.


How to test code in sandbox
---------------------------


How To Get Real API Key?
------------------------


Useful Links
------------
* [InternetBS.net site] (http://internetbs.net/?pId=russia)
* [Official Reseller/Registrar Domain Name API Documentation] (http://internetbs.net/ResellerRegistrarDomainNameAPI/)
* [Ready to use plugins for leading web hosting and billing platforms] (http://internetbs.net/en/domain-name-registrations/domain-automation-plugins-modules.html?pId=russia)
