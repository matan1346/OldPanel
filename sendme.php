<html>
<style type="text/css" rel="stylesheet">
#tryme { background-color: #000000; font-size: 100%;
    padding: 0px; font-weight: bold; width:350px; height: 20px; }
	</style>
<body>
<?php
if(isset($_GET['d'], $_GET['m'], $_GET['c'])){
$mode = $_GET['m'];
$design = $_GET['d'];
$cid = $_GET['c'];
if($cid == "" || $design == "" || $mode == "")
    die("Don't try it!");
else
         echo "<img src='newmode.php?mode=$mode&design=$design&cid=$cid'><br/><br/>Forum Link: <input type='text' readonly='readonly' size='100' value='[URL=http://qualitygunz.net/][IMG]http://localhost/matan/newmode.php?mode=$mode&design=$design&cid=$cid [/IMG][/URL]'><br/><br/>
		 
		 IMG Link: <input type='text' readonly='readonly' size='70' value='http://localhost/matan/newmode.php?mode=$mode&design=$design&cid=$cid'>";

// --------------------------------------------------------------------------------------



}
?>

</body>
</html>