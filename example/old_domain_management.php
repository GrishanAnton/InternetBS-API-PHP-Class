<?php
include_once('../IntbsInterface.php');
include_once('../IntbsAPI.php');

/**
 * This example show main domain related managment operations like:
 * - check if domain(s) available for registration
 * - register domain(s) with
 * - renew domain
 * - update assigned NS list
 * - update contact information
 * - get domain info
 */

try {

    // Step 0. Prepare needed data
    $domainName1 = time().'-intbstest-1.com'; // we need 2 domain names for testing and we need to be sure that domain is available for registration
    $domainName2 = time().'-intbstest-2.com';

    $api = new IntbsAPI('apikey', 'password', true); // Create api access object to grant access to test server

    // Step 1. Check if domains(s) available for registration
    if($api->domainCheck($domainName1))    {
        echo "Domain: ".$domainName1." is AVAILABLE!<br/>\n";
    } else {
        echo "Hmmmm domain ".$domainName1." is UNAVAILABLE!<br/>\n";
        // It's a bit unexpected situation but let's add some rand prefix and continue
        $domainName1 = rand(1,10000).'-'.$domainName1;
    }

    // Do same check for second domain name
    if($api->domainCheck($domainName2))    {
        echo "Domain: ".$domainName2." is AVAILABLE!<br/>\n";
    } else {
        echo "Hmmmm domain ".$domainName2." is UNAVAILABLE!<br/>\n";
        // It's a bit unexpected situation but let's add some rand prefix and continue
        $domainName2 = rand(1,10000).'-'.$domainName2;
    }


    // Step 2. Let's try to register domain name

    // For list of contacts details names please see: http://www.internetbs.net/ResellerRegistrarDomainNameAPI/api/01_domain_related/02_domain_create
    $contact = array(
        'Firstname'    => 'John',
        'Lastname'     => 'Smith',
        'Organization' => 'My Company Name',
        'CountryCode'  => 'US',
        'State'        => 'WA',
        'City'         => 'Seattle',
        'Email'        => 'John.Smith@email.com',
        'Street'       => '100 Main str.',
        'Street2'      => 'h.43-125',
        'PostalCode'   => '98104',
        'PhoneNumber'  => '+1.9033337711',
    );

    // We will use same contact data for all 4 contact types
    $contacts = array(
        'Registrant' => $contact,
        'Admin'      => $contact,
        'Technical'  => $contact,
        'Billing'    => $contact,
    );

    // Ok. Now we are ready to register first domain for 1 year
    // ... and also let's set some NS for this domain with same command
    $expirationDate1 = $api->domainCreate($domainName1, $contacts, 1, array('Ns_list' => 'n1.mydns.org,n2.mydns.org'));

    echo "Domain ".$domainName1." registered, expiration date is ".date('Y-m-d', $expirationDate1)."<br/>\n";


    // Step 3. Let's register one more domain, but this time we will just clone contact data from first domain name
    // ... also let's register this domain for 2 year and also let's enable for this domain free "Private Whois Service"
    // ... all this done with single command
    $expirationDate2 = $api->domainCreateCloneContactsFromDomain($domainName2, $domainName1, 2, array('privateWhois' => 'FULL'));


    // Step 4. Renew domains


    // Step 5. Now we can assign or update assigned NS list
    $api->domainAssignNS($domainName2, array('ns1.server.in', 'ns2.server.in')); // Assign NS to domain
    $api->domainAssignNS($domainName1, array('n1.'.$domainName1.' 50.51.54.51 50.51.54.52', 'n2.'.$domainName1.' 2001:0DB8:AA10:0001:0000:0000:0000:00FB','ns3.dns.ru'));// create host object and replace current NS list by new one with same command


    // Step 6. Change email address for admin contact
    $contact = array(
        'Email'=> 'JohnSmith@inbox.net',
    );

    // We will use same contact data for all 4 contact types
    $contacts = array(
        'Admin'      => $contact,
    );
    $api->domainUpdate($domainName1, $contacts);

    echo "Contact updated for ".$domainName1."<br/>\n";


    // Step 7. Check current domain information
    echo "Domain info: ".$domainName1."<br/>\n";
    var_dump($api->domainInfo($domainName1));

    echo "Domain info: ".$domainName2."<br/>\n";
    var_dump($api->domainInfo($domainName2));

    echo "\nTHE END!\n\n";

} catch (Exception $e) {
    // We not expect some exceptions during this test so if it happen for some reason, please check a code
    echo "OOPS! ".$e->getMessage()."\n";
    var_dump($e);
}
