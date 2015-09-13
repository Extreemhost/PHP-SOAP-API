<?php 
include_once('class/class.soapclient.php');

# make new soap object
$SoapClient = new PHPSoapClient();

$fArgs = array('securecode' => '');

# make the soap call
echo $SoapClient->_callSoapClient('securecode', $fArgs);
?>