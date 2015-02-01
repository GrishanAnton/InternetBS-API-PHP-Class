<?php
include_once('../IntbsInterface.php');
include_once('../IntbsAPI.php');

/**
 * If during API command execution happen some issue, api class will throw Exception.
 * By default it will be standard PHP Exception. But if you want you may assign to
 * each error specific exception class name. See example below
 */

// Let's create 3 custom exception classes
class LogicException   extends Exception {}
class NetworkException extends Exception {}
class ApiException     extends Exception {}

// Now we just create a API object instance
$api = new IntbsAPI('apikey', 'password', true);

//... and now we may assign for each error type some specific exception class name
$api->_setExceptionClassNameForErrorType(IntbsInterface::errorType_internal, 'LogicException');
$api->_setExceptionClassNameForErrorType(IntbsInterface::errorType_network,  'NetworkException');
$api->_setExceptionClassNameForErrorType(IntbsInterface::errorType_api,      'ApiException');

// Ok. Now let's try to execute some API operation which will throw exception
try {
    $api->domainCheck('wrong domain name !!!');
} catch(Exception $e){
    echo get_class($e).": ".$e->getCode()." - ".$e->getMessage()."\n";
}

echo "\nTHE END!\n\n";
?>