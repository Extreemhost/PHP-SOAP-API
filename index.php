<?php
# Read about PHP SOAP at http://www.php.net/manual/en/book.soap.php

# set ini 
ini_set('session.cookie_httponly', true);	# HTTP only on
ini_set('session.cookie_secure', true);	# Secure cookies and cookie-set
ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0');
ini_set("session.auto_start", 0); 

# 1. Create a Session in PHP
session_start();

# 2. Load Class files
require_once('../hcp/include/config.php');
require_once('../hcp/include/defines.php');
require_once('classes/class.soapserver.php');

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