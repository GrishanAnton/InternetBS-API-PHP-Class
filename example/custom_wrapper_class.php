<?php
include_once('../IntbsInterface.php');

/**
 * To make code clear and easy to use/read better to create some wrapper class for IntbsInterface.
 * For this reason we create for you class IntbsAPI, but if you need you may create your own class
 * wrapper or extends existing. See example below.
 */

class MyOwnApiClass extends IntbsInterface {

    /**
     * Check if domain available for registration
     * @param $domainName
     * @throw Exception if some network or API related issue detected
     * @return boolean true if domain available for registration and false if not
     */
    public function domainCheck($domainName)   {
        // Execute domain check command at
        $result = $this->_executeApiCommand('Domain/Check', array('Domain' => $domainName));

        if($this->_isSuccess())    {
            // Command executed
            return $this->_isSame($result['status'], 'AVAILABLE');

        } else {
            // Command failed
            throw new Exception($this->_lastErrorMessage(), $this->_lastErrorCode());
        }

    }
}

// Step 1. Ok. Now let's try to create instance of our wrapper class
try {
    $api = new MyOwnApiClass('apikey', 'password', true);

    if($api->domainCheck('my-super-domain.com'))    {
        echo "AVAILABLE\n";
    } else {
        echo "UNAVAILABLE\n";
    }
} catch (Exception $e) {
    echo "ERROR: ".$e->getCode()." - ".$e->getMessage()."\n";
}

echo "\nTHE END!\n\n";
?>