<?php 
include_once('class/class.soapclient.php');

# make new soap object
$SoapClient = new PHPSoapClient();

# any arguments?
$CallParams = array(
    'username'	=> '',
    'password'	=> ''
);

# make the soap call
echo $SoapClient->_callSoapClient('login', $CallParams);

$CallClient = array('securecode' => '');

# make the soap call
echo $SoapClient->_callSoapClient('setSecureCode', $CallClient);
?>
