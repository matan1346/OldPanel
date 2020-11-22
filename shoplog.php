<?php
session_start();
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
<b>Welcome shurpshuter.</b><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />

<?php
if($_SESSION['shopass']!="Matan"){
?>
<center>
<table border="0" width="623" id="table2" cellspacing="1" style="border-collapse: collapse">
	<tr>
		<td>

		<p align="center"> asd <p>
<font face="Arial" style="font-size: 8pt"><font style='color: #FFFFCC'>

	Please Enter The Code To Enter Here<br />
	<form action='?act=log' method="POST">
	<input type="text" name="pincode" />
	<input type="submit" name="go" Value="Enter" />
	</form>

</font>
</p></td>
	</tr>
</table>
</center>
<?php

}
if(isset($_POST['go'])&&$_POST['pincode']==""){
       die("You Must Enter The Code");
	   }
else if($_POST['pincode']=="Matan"||$_SESSION['shopass'] == "Matan")		          
{
$_SESSION['shopass'] = "Matan";
?>

<!-- ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss /-->


<table border="0" width="623" id="table2" cellspacing="1" style="border-collapse: collapse">
	<tr>
		<td>

		<p align="center"> asdas <p>
<font face="Arial" style="font-size: 8pt"><font style='color: #FFFFCC'>
<center>


Shop Logs:<br />
		<table border="1">
		<tr>
		<tr>
		<th><font style='color: #FFFFCC'>Num</th>

		<th><font style='color: #FFFFCC'>UserID</th>
		<th><font style='color: #FFFFCC'>Log</th>
		<th><font style='color: #FFFFCC'>Char</th>
		<th><font style='color: #FFFFCC'>Date</th>
		<th><font style='color: #FFFFCC'>Section</th>
		</tr>

			<tr>
		    <td><font style='color: #FFFFCC'>424</td>
		    <td><font style='color: #FFFFCC'>yellowr</td>
                    <td><font style='color: #FFFFCC'>The UserID "yellowr" Bought The ItemID "13142" for 7 days. He had 3 PP and now 0 PP</td>
                    <td><font style='color: #FFFFCC'>Error</td>
                    <td><font style='color: #FFFFCC'>Jun 28 2011  2:34PM</td>

                    <td><font style='color: #FFFFCC'>Item</td>
			</tr>
			

<hr />
Search Logs By
<br />
	      <form action="index.php?pan=shoplog&&act=search" method="post" name="myformd">
      	      <select name="val" size="1">
       	      <option selected value="UserID">UserID</option>
       	      <option value="Char">Char</option>
       	      <option value="Log">In Log</option>
       	      </select><br />

	      <input type="text" name="choose" />
		<br />
		Search In:
		<br />
		All Sections <input type="checkbox" name="all" Value="1" /> <br />
		Items <input type="checkbox" name="item" Value="1" /> <br />
		Name Changing <input type="checkbox" name="nchange" Value="1" /> <br />

		Coloring <input type="checkbox" name="color" Value="1" /> <br />
		Level Up <input type="checkbox" name="lvl" Value="1" /> <br />
		Lotto <input type="checkbox" name="lotto" Value="1" /> <br />
		Gift <input type="checkbox" name="gift" Value="1" /> <br />
		Reborn <input type="checkbox" name="reborn" Value="1" /> <br />

	      <input type="submit" name="submit2" value="Go" />
	      </form><br />
</font>
</p></td>
	</tr>
</table>
<?php
//unset($_SESSION['shopass']);
}
else if(isset($_POST['go'])&&$_POST['shopass']!="Matan")
{
die("Wrong Password");
}

?>
</center>
</body>
</html>