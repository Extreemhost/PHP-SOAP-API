<?php
# Read about PHP SOAP at http://www.php.net/manual/en/book.soap.php

# 1. Create a Session in PHP
session_start();

# 2. Load Class files
require_once('class/class.soapserver.php');

# 3. Service
# Make new soap server object
$options = array(
	'uri'		=> 'https://www.extreemhost.nl/soap/',
	'encoding'	=> 'utf-8'
);

$server = new SoapServer(null, $options);


# 4. set the class to use register functions
$server->setClass('SoapServerConnect');

# 5. set persistance mode
$server->setPersistence(SOAP_PERSISTENCE_SESSION);

# 6. handle the request
$server->handle();
?>
