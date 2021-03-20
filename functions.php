<?php 

/**
 * Funkcija koja ispituje da li je unešen string domen, ip adresa ili hash.
 *
 * @param string $param String iz kojeg ispituje.
 * @return string
 *
*/

function getOption ($param) {

	if(filter_var($param, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== FALSE) {
		return 'ipv4';
	} else if (filter_var($param, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== FALSE) {
		return 'ipv6';
	} else if (filter_var(gethostbyname($param), FILTER_VALIDATE_IP)) {
		return 'domain';
	} else if (preg_match("/^[a-fA-F0-9]{32}$/", $param) || preg_match("/^[a-fA-F0-9]{40}$/", $param)) {
		return 'hash';
	} else {
		return 'invalid';
	}

}

?>