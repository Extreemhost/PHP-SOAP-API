<?php 
include_once('class/class.soapclient.php');

# make new soap object
$SoapClient = new PHPSoapClient();

$CallClient = array('securecode' => '');

# make the soap call
echo $SoapClient->_callSoapClient('setSecureCode', $CallClient);
?>
