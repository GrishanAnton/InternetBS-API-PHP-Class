<?php
include_once('../IntbsInterface.php');
include_once('../IntbsAPI.php');

/**
 * It could be a great idea to write in log each api command/response.
 * Log may help to debug code and easy find the error if any.
 *
 * By default api interface have 2 method of write log:
 * - write log to file
 * - print log to stdout
 *
 * Let's see how it's works!
 */

try {

    $api = new IntbsAPI('apikey', 'password', true);

    // Case 1. We can write log in file, we did not specify any file name
    // and for this reason class will create a system file like "intbsapi_2015_02_17.log"
    $api->_setLogConfig(IntbsInterface::writeLogCase_always, array('method' => 'file'));
    $api->domainCheck('example-domain-1.com');

    // Case 2. We can specify custom log file name
    $api->_setLogConfig(IntbsInterface::writeLogCase_always, array('method' => 'file', 'path' => 'my_api_log.log'));
    $api->domainCheck('example-domain-2.net');

    // Step 3. We can just print all log information
    $api->_setLogConfig(IntbsInterface::writeLogCase_always, array('method' => 'screen'));
    $api->domainCheck('example-domain-3.org');

    // Step 4. We can log only failed commands
    $api->_setLogConfig(IntbsInterface::writeLogCase_onError, array('method' => 'file', 'path' => 'api_error.log'));
    $api->domainCheck('you-will-not-see-it-in-log.info');
    try {
        $api->domainCheck('but this one you will see in log!');
    } catch(Exception $e){}

    echo "\nTHE END!\n\n";

} catch (Exception $e) {
    echo "OOPS! ".$e->getMessage()."\n";
}



?>