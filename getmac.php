<?php

//LIAD-------------

/*
* Getting MAC Address using PHP
* Md. Nazmul Basher
*/

ob_start(); // Turn on output buffering
system('ipconfig /all'); //Execute external program to display output
$mycom=ob_get_contents(); // Capture the output into a variable
ob_clean(); // Clean (erase) the output buffer

$findme = 'Physical';
$pmac = strpos($mycom, $findme); // Find the position of Physical text
$mac=substr($mycom,($pmac+36),17); // Get Physical Address

echo $mac;

//LIAD-----------------------
?> 


<?php






echo '<br /><br /><br /><br />';


//this function:
function getMac(){
	exec("ipconfig /all", $output);
	foreach($output as $line){
		if (preg_match("/(.*)Physical Address(.*)/", $line)){
			$mac = $line;
			$mac = str_replace("Physical Address. . . . . . . . . :","",$mac);
		}
	}
	return $mac;
}
//end of the function.

//get function started
$mac = getMac();
$mac = trim($mac);
//echo mac address
echo $mac;
















echo "<br/><br/>";
$cp_name = "a";












echo getenv('COMPUTERNAME');

echo "<br/><br/>";

echo $ENV{SERVER_SIGNATURE};
?>