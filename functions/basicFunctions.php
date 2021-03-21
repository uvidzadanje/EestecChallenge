<?php 

/**
 * Funkcija koja ispituje da li je unešen string domen, ip adresa ili hash.
 *
 * @param string $param String iz kojeg ispituje.
 *
 * @return string
 *
*/

function getTypeInput ($param) {

	if(filter_var($param, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== FALSE) {
		return 'ip';
	} else if (filter_var($param, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== FALSE) {
		return 'ip';
	} else if (filter_var(gethostbyname($param), FILTER_VALIDATE_IP)) {
		return 'domain';
	} else if (preg_match("/^[a-fA-F0-9]{32}$/", $param) || preg_match("/^[a-fA-F0-9]{40}$/", $param)) {
		return 'hash';
	} else {
		return 'invalid';
	}

}


/**
 * Funkcija koja povlači podatke putem cURL 
 *
 * @param string $url URL gde treba poslati request.
 * @param string $method Kojom metodom saljemo request (post/get).
 * @param array $headers Headere koje saljemo.
 * @param integer $timeout Timeout nakon koga prekidamo request.
 *
 * @return string
 *
*/

function makeRequest ($url, $method, $headers, $timeout = 60) {

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method); 
	//curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);                                                                                                                   
	$response = curl_exec($ch);
	curl_close($ch);

	return $response;

}




/**
 * Funkcija koja uzima podatke iz predefinisane Python skripte 
 *
 * @param string $tip Koji je tip parametra
 * @param string $param Prosledjivanje parametra
 *
 * @return string
 *
*/

function getData ($moduleName, $tip, $param) {

	$param = escapeshellcmd($param);

	return shell_exec(getcwd().'/module.sh '.$moduleName.' '.$tip.' '.$param);

}


?>