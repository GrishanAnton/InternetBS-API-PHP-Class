# InternetBS API PHP Class
PHP to get easy access to all InternetBS reseller API functions

### Supported Features
--------

### Usage Example - Quick Start
--------
Usage of InternetBS Reseller API class is very easy. Just see example below:
```php
include_once('InternetBS.php');

try {

    // You already can execute command at test server! Let's do:
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

That is really simple right? See other examples in "example" and class documentation in "doc" directories.

**NOTE:** command execution at test server usually taking longer time than at live server

### How to Test Code at Sandbox Server
--------
If you not specify a valid API key and password then all commands will be executed at test server. So to execute command at test server you actually no need to do anything it will be done by default.

### How To Get Real API Key?
--------
To execute commands at live server you need valid API key. To get an API key you need to perform 4 simple steps:

* Create [new account](https://internetbs.net/newaccount.html?pId=russia) at InternetBS site using [this link](https://internetbs.net/newaccount.html?pId=russia).
* After registration open control panel and see at the top of the page (right upper conner) link **Get API Key**, click this link.
* Follow instructions. You will need to add funds to your balance in order to be able to execute payable operations like domain registration, renew, transfer and so on.
* When you are done you will get your own API key and password.


Once you got it you may use to execute any API commands at real live server. To use your API key and password just do once somewhere in script begin:
```php
InternetBS::init('MyApiKey', 'mypassword');
//.... here we can execute any command(s) at live server
```

### Useful Links
--------
* [InternetBS.net] (https://internetbs.net/?pId=russia) -- official registrar site
* [Reseller/Registrar Domain Name API Documentation] (http://internetbs.net/ResellerRegistrarDomainNameAPI/)
* [Ready to use plugins for leading web hosting and billing platforms] (http://internetbs.net/en/domain-name-registrations/domain-automation-plugins-modules.html?pId=russia)
