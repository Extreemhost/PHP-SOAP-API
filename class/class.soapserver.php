<?php
	session_start();
	
	# PHP SOAP SERVER
	class SoapServerConnect
	{
		private function setSecureCode($securecode) {
			# should load DB end Config settings
			global $database;
			global $config;
			
			# MYSQLI
			$query	= $database->query("SELECT * FROM `clients` WHERE `api_securecode` = '".$database->real_escape_string(md5(sha1(hash('SHA256', hash('SHA384', hash('SHA512', $securecode.$config['salt']))))))."' LIMIT 1");
			$row	= $query->fetch_assoc();
			# checking if is real secure code 
			if($securecode != $row['api_securecode'])
			{
				$_SESSION['session_securecode'] = $row['api_securecode'];
				#
				return '004: successful<br />';
			}
			else
			{
				return '003: unsuccessful<br />';
			}
		}
		private function login($username, $password) {
			# should load DB end Config settings
			global $database;
			global $config;		
			# MYSQLI
			$query	= $database->query("SELECT * FROM `clients` WHERE `email` = '".$database->real_escape_string($username)."' AND `api_password` = '".$database->real_escape_string(md5(sha1(hash('SHA256', hash('SHA384', hash('SHA512', $password.$config['salt']))))))."' LIMIT 1");
			$row	= $query->fetch_assoc();
			#
			if($row['ban'] != 0) print('045: Account blocked for administrative reasons'); else
			if($row['clientnr'] != '' && $row['api'] != 0)
			{
				$_SESSION['session_login']	=	'ok';
				$_SESSION['session_clientnr']	=	$row['clientnr'];
				$_SESSION['session_api']	=	$row['api'];
				#
				return '002: successful<br />';
			}
			else
			{
				return '001: unsuccessful<br />';
			}
		}
		# default anwser when the client doesn't specify any function to call
		public function defaultAnswer() {
			return 'There is no functions specified to call';
		}
	}
?>
