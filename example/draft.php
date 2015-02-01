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
    InternetBS::init('MyApiKey', 'mypassword');

    // Now you may execute command at live server
    if(InternetBS::api()->domainCheck('check-at-live-server.org'))    {
        echo "Domain available!\n";
    } else {
        echo "Domain unavailable!\n";
    }

} catch (Exception $e) {
    echo "OOPS Error: ".$e->getMessage()."\n";
}




?>