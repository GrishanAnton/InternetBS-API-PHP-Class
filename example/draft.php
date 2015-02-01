<?php
include_once('../InternetBS.php');

/**
 * Simple example for API usage
 */

try {

    // Execute command at test server
    if(InternetBS::api()->domainCheck('check-at-test-server.com'))    {
        echo "Domain available!\n";
    } else {
        echo "Domain unavailable!\n";
    }

    // To execute command at live server you just need to set your API key and password
    // You need to initiate it only once and after that all commands will be executed at
    // live server
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




?>