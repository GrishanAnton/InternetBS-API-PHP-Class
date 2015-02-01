<?php
include_once('../InternetBS.php');

/**
 * Simple example for API usage
 */

// Perform domain check operation at test server
if(InternetBS::api()->domainCheck('aaa-bbb-ccc-sss.com'))    {
    echo "Domain available!\n";
} else {
    echo "Domain unavailable!\n";
}


?>