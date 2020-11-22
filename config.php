<?php
if(stristr($_SERVER['PHP_SELF'], "config.php")) die('asdada'); 
//@session_start();

//MSSQL Server configuration

$_MSSQL['Host']               = "MATAN-PC";
$_MSSQL['User']               = "sa";
$_MSSQL['Pass']               = "84269713n,i";
$_MSSQL['DBNa']               = "GunzDB3";

$r2 = mssql_connect($_MSSQL['Host'], $_MSSQL['User'], $_MSSQL['Pass']) or die("Cant connect to database");
mssql_select_db($_MSSQL['DBNa'], $r2);

?>