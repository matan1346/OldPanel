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
<b>Welcome <?php echo $userid; ?>.</b><br />
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
	      <form action="index.php?pan=account&&act=ban" method="post" name="myform">
      	      <select name="bval" size="1">
       	      <option selected value="253">Ban</option>
       	      <option value="104">Chat Ban</option>
       	      <option value="252">Invisible Admin</option>

<hr />       	      <option value="254">GM</option>
       	      <option value="255">Admin</option>
	      <option value="2">JJANG</option>
		<option value="0">Normal</option>
       	      </select>
	 Account By:
      	      <select name="val" size="1">

       	      <option selected value="UserID">ID</option>
       	      <option value="AID">AID</option>
       	      <option value="Name">Character Name</option>
       	      <option value="CID">CID</option>
       	      </select>
	 For:
      	      <select name="time" size="1">

       	      <option selected value="86400">Day</option>
       	      <option value="259200">3 Days</option>
       	      <option value="604800">Week</option>
       	      <option value="0">Unlimit</option>
       	      </select><br />
	 <input type="text" name="ban" />
	 <input type="submit" name="submit" value="Ban" onclick="return reasonenter(0)" />

         <input type="hidden" name="hidden" value="unchanged" />
	</form><br />
<hr />
IP Ban By:
<br />
	      <form action="index.php?pan=account&&act=banip" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="Name">Character Name</option>
       	      <option value="CID">CID</option>

       	      <option value="AID">AID</option>
       	      <option value="UserID">UserID</option>
       	      </select><br />
	      <input type="text" name="id" />
	      <input type="submit" name="submit" value="Ban" onclick="return reasonenter(1)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />
<hr />

IP UnBan By:
<br />
	      <form action="index.php?pan=account&&act=unbanip" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="ip">IP</option>
       	      <option selected value="id">ID</option>
       	      </select><br />
	      <input type="text" name="id" />
	      <input type="submit" name="submit" value="Ban" onclick="return reasonenter(2)" />

              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />
<hr />

Get Info By:
<br />	
	      <form action="index.php?pan=account&&act=info" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="Name">Character Name</option>
       	      <option value="CID">CID</option>

       	      <option value="AID">AID</option>
       	      <option value="UserID">UserID</option>
       	      <option value="LastIP">LastIP</option>
			  <option value="MAC">Mac Address</option>
       	      <option value="UGradeID">UGradeID</option>
       	      </select>

	      <br />
	      <input type="text" name="choose" />
	      <br />
			Exact match?
	      <input type="checkbox" name="exact" value="a" />
	      <br />
	      <input type="submit" name="submit" value="submit" />
	      </form><br />
<hr />
Change ` By:

<br />
	      <form action="index.php?pan=account&&act=capass" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="UserID">UserID</option>
       	      <option value="AID">AID</option>
       	      </select>
	      <input type="text" name="id" />
	      <br />New `:
	      <input type="text" name="npass" />

	      <input type="submit" name="submit54" value="Go" onclick="return reasonenter(4)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />
<hr />
Change UserID By:
<br />
	      <form action="index.php?pan=account&&act=cid" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="UserID">UserID</option>
       	      <option value="AID">AID</option>

       	      </select>
	      <input type="text" name="id" />
	      <br />New UserID:
	      <input type="text" name="nid" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(5)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />
</font>
</p></td>
	</tr>

</table>
</center>
</body>
</html>