<?php 
	class PHPSoapClient
	{
		# These fields are SOAP related
		const WSDL	= 'https://extreemhost.nl/soap/';
		const VERSION = '1.0';
		protected static $_soapClient = null;

		public function _callSoapClient($sFunction = null, $aArgs = null)
		{
   			if (!empty($aArgs))
			{
   				if (!is_array($aArgs))
				{
   					return 'Arguments is not an array!';   			
   				}
   			}
   			if (empty($sFunction))
			{
   				$sFunction = 'defaulAnwser';
			}
		
			$options = array(
				'location'	=> 'https://www.extreemhost.nl/soap/',
				'uri'		=> 'https://www.extreemhost.nl/',
				'encoding'	=> 'utf-8',				# lets support unicode
				'features'	=> SOAP_SINGLE_ELEMENT_ARRAYS,	# see http://bugs.php.net/bug.php?id=43338
				'trace'	=> 0,					# can be used for debugging 0 = off/1 = on
			);

			$client = new SoapClient(null, $options);
			return $client->__soapCall($sFunction, $aArgs);
		}
	}
?>