<?php
session_start();

$myname = "Matan";

if(!function_exists("alertbox")){
function alertbox($text, $url)
{
    echo "<script>alert('$text');document.location = '$url'</script>";
    die("Javascript disabled");
}
}


//$_SESSION[UserID] = "shurpshuter";
if($_SESSION[UserID] == "")
    {
	   alertbox("You Must Login First","login.php");
      die();
	}
	$userid = $_SESSION[UserID];
	require('config.php');
?>

<script type="text/javascript">
function openpic(pic)
{
window.open("upload/"+pic , "" , "width=1280 , height=1024");
}
</script>

<script type="text/javascript">
function reasonenter(num)
{
var a = prompt("Please Enter The Reason" , "");
if (a != "" && a != null)
{
  document.forms[num].hidden.value = a;
  return true;
}
else
{
 return false;
}
}
</script>
 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1255" />
<html>
<head>
<title>Panel</title>
<style type="text/css">
body {
	background-image:  url(bg.gif);
	background-color: #121212;
	background-repeat:repeat-x
}
a
{
text-decoration: none;
color:#00ff00;
}
</style>
</head>

<body>
<table width="750" height="40" border="0" align="center" background="img/menu.png" style="background-repeat:no-repeat">

  <tr>
    <td width="30"></td><b>
    <td width="676"><div align="center" class="ad"> <span class="ad"><a href="index.php">
		<font size="2">Home</font></a><font size="2"> | <a href="accounts.php">Accounts</a> |  <a href="character.php">Characters</a> | <a href="clans.php">Clans</a> |<a href="shoplog.php">Shop Log</a> 
		|</font></span><b><span class="ad"><font size="2"> </b> <a href="Eventlog.php">Event 
		Log</a><b> </b>

		</font> </span><span class="ad"><font size="2"> | <a href="punish.php">Punishments info</a>
		</font> </span><span class="ad"><font size="2"> | <a href="report.php">Week Report</a>
		</font> </span> </b></div></td>
    <td width="30"></td>

  </tr>
</table>
<center>
<b>Welcome <?php echo $userid;?>.</b><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<table border="0" width="623" id="table2" cellspacing="1" style="border-collapse: collapse">
	<tr>
		<td>

		<p align="center">  <p>
<font face="Arial" style="font-size: 8pt"><font style='color: #FFFFCC'>
<center>
Panel Created By Liad[Dist] For Quality GunZ, All Rights Reserved.
<br />
Logs:<br />
<table border="1">
<tr>
<th><font style='color: #FFFFCC'>Num</th>
<th><font style='color: #FFFFCC'>UserID</th>
<th><font style='color: #FFFFCC'>Log // Reason</th>

<th><font style='color: #FFFFCC'>Date</th>
<th><font style='color: #FFFFCC'>Section</th>
</tr>
<?php
require('config.php');
$query =mssql_query("SELECT TOP 20 ID,LogP,Reason,Account,Time,Name,Section FROM PanelLog ORDER BY ID DESC");
 $num4 = mssql_num_rows($query);
 $i=0;
 while($i < $num4){
 $row = mssql_fetch_row($query);
 $id = $row[0];
 $log = $row[1];
 $reason = $row[2];
 $byuser = $row[3];
 $time = $row[4];
 $name = $row[5];
 $section = $row[6];

	echo("	<tr>
		    <td><font style='color: #FF0000'>$id</td>
		    <td><font style='color: #FF0000'>$byuser \\ $name</td>
                    <td><font style='color: #FF0000'>$log<br /><hr /><font style='color: #FFFFCC'>$reason</td>
                    <td><font style='color: #FF0000'>$time</td>
                    <td><font style='color: #FF0000'>$section</td>
		</tr>");
$i++;
}		
?>
<hr />
Search Logs By
<br />
	      <form action="index.php?pan=index&&act=info" method="post" name="myformd">
      	      <select name="val" size="1">
       	      <option selected value="UserID">UserID</option>

       	      <option value="NUM">Number</option>
       	      <option value="Log">In Log</option>
       	      </select><br />
	      <input type="text" name="choose" />
	      <input type="submit" name="submit2" value="Go" />
	      </form><br />
</font>
</p></td>
	</tr>

</table>
</center>
</body>
</html>