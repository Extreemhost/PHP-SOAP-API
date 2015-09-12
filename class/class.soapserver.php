<?php
	session_start();
	
	# PHP SOAP SERVER
	class SoapServerConnect
	{

		function setSecureCode($securecode)
		{
			global $database;
			global $config;
			#
			$query	= $database->query("SELECT * FROM `clients` WHERE `api_securecode` = '".$database->real_escape_string(md5(sha1(hash('SHA256', hash('SHA384', hash('SHA512', $securecode.$config['salt']))))))."' LIMIT 1");
			$row	= $query->fetch_assoc();
			#
			if($key != $row['api_key'])
			{
				$_SESSION['key'] = $row['api_key'];
				#
				return '004: Succesvol<br />';
			}
			else
			{
				return '003: Onsuccesvol<br />';
			}
		}

		# function to give the current date as an anwser
		public function getDateToday()
		{
			return date("d-m-Y");
		}

		# default anwser when the client doesn't specify any function to call
		public function defaultAnswer() {
			return 'There is no functions specified to call';
		}
	}
?>
