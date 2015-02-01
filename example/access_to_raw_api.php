<?php
include_once('../IntbsInterface.php');

/**
 * This simple code demonstrate how easy to use InternetBS API interface directly,
 * even without any wrapper class or so. Let's try to check at test server if some
 * domain avaiable for registration or not.
 */

// Step 1. Let's choose some random domain name which is most likely available for registration
$testDomainName = 'test-domain-'.time().'.com';

// Step 2. Prepare input parameters accordingly with API documentation requirements.
// NOTE: you no need to add there some "ApiKey" or "Password" parameter values,
// it will be added by interface automatically
$params = array(
    'Domain' => 'test-domain-'.time().'.com'
);

// Step3. Use basic IntbsInterface directly without any wrapper classes
// NOTE: 3rd parameter set to "true", it's means that API command will
// be executed at test server and API key and password will be ignored
$api = new IntbsInterface('apikey', 'password', true);

// Execute command at API test server
$result = $api->_executeApiCommand('Domain/Check', $params);

// Show result
var_dump($result);

echo "\nTHE END!\n\n";
?>