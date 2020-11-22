<?php
session_start();

if(!function_exists("alertbox")){
function alertbox($text, $url)
{
    echo "<script>alert('$text');document.location = '$url'</script>";
    die("Javascript disabled");
}
}

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
		<font size="2">Home</font></a><font size="2"> | <a href="index.php?pan=account">Accounts</a> |  <a href="index.php?pan=character">Characters</a> | <a href="index.php?pan=clan">Clans</a> |<a href="index.php?pan=shoplog">Shop Log</a> 
		|</font></span><b><span class="ad"><font size="2"> </b> <a href="index.php?pan=winev">Event 
		Log</a><b> </b>

		</font> </span><span class="ad"><font size="2"> | <a href="index.php?pan=punish">Punishments info</a>
		</font> </span><span class="ad"><font size="2"> | <a href="index.php?pan=notepad">Week Report</a>
		</font> </span> </b></div></td>
    <td width="30"></td>

  </tr>
</table>
<center>
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
Login:
<br />
<form action='?asdas' method='post' name='myform'>
<br />
<b><font face="arial" size="3"></b></font>User ID:<input type="text" name="user" /><br /><br />
<b><font face="arial" size="3"></b></font>Password:<input type="password" name="pass" />
<br /><br />
<input type='submit' value='Go' name='check_if_press'>
</form>

</font>

</p></td>
	</tr>
</table>

<?php
if(isset($_POST['check_if_press'])){
     if($_POST['user']=="")
	    die("You Must Fill The User Field!");
	 if($_POST['pass']=="")
	    die("You Must Fill The Pass Field!");
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	require('config.php');
	$check = mssql_query("SELECT * FROM Login WHERE UserID = '$user' AND Password = '$pass'");
	if(mssql_num_rows($check)>0){
	   //echo "<strong><font color='#FFFFFF'>Account Found!<br />";
	   $row = mssql_fetch_assoc($check);
	   //echo "Is AID is:".$row['AID'];
	   $check2 = mssql_query("SELECT * FROM Account WHERE UserID = '$user'");
	   if(mssql_num_rows($check2)>0){
	        $row2 = mssql_fetch_assoc($check2);
			if($row2['UGradeID']==255||$row2['UGradeID']==254||$row2['UGradeID']==252)
			   {
	          $_SESSION[UserID] = $user;
			  $_SESSION['AID'] = $row2['AID'];
			  $grade = $row2['UGradeID'];
	           alertbox(".".$user." Got ".$grade." Premmision","index.php");
		   }
		      alertbox("You are not from the stuff!","http://www.google.com");
	      }
		  die("There Is And Error At The Data Base!");
	 }
	 die("The Account or the Password Are Wrong!");

}
?>

</center>
</body>
</html>