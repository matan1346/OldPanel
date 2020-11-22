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
<table border="0" width="623" id="table2" cellspacing="1" style="border-collapse: collapse">
	<tr>
		<td>

		<p align="center">  <p>
<font face="Arial" style="font-size: 8pt"><font style='color: #FFFFCC'>
<center>
Change Clan Name By
<br />
	      <form action="index.php?pan=clan&&act=cname" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="cName">Masters Name</option>
       	      <option value="MasterCID">Masters CID</option>

       	      <option selected value="Name">Clan Name</option>
       	      <option selected value="CLID">CLID</option>
       	      </select><br />
	      <input type="text" name="id" />
	      <br />New Name:<br />
	      <input type="text" name="nid" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(0)" />

              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />



<hr />
Create Clan:
<br />
	      <form action="index.php?pan=clan&&act=cclan" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="Name">Masters Name</option>

       	      <option value="MasterCID">Masters CID</option>
       	      </select>
	      <input type="text" name="cid" /><br />
Clan Name:
	      <input type="text" name="id" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(1)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />




<hr />
Delete Clan:
<br />
	      <form action="index.php?pan=clan&&act=dclan" method="post" name="myform">
Clan Name:
	      <input type="text" name="id" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(2)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />

<hr />
Change Score By Clan Name:
<br />
	      <form action="index.php?pan=clan&&act=cscore" method="post" name="myform">
      	      <select name="bval" size="1">
       	      <option selected value="Set">Set</option>
       	      <option value="Add">Add</option>
       	      <option selected value="Reduce">Reduce</option>
       	      </select><br />

      	      <select name="val" size="1">
       	      <option selected value="Points">Points</option>
       	      <option value="Wins">Wins</option>
       	      <option selected value="Losses">Losses</option>
       	      <option selected value="Draws">Draws</option>
       	      </select><br />
	      <input type="text" name="id" /><br />

Clan Name:
	      <input type="text" name="name" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(3)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />

<hr />
Change Clan Grade:
<br />
	      <form action="index.php?pan=clan&&act=cgrade" method="post" name="myform">
      	      <select name="bval" size="1">
			  <option selected value="1">Leader</option>

       	      <option selected value="2">Admin</option>
       	      <option value="9">Normal</option>
       	      </select><br />
      	      <select name="val" size="1">
       	      <option selected value="Name">Character Name</option>
       	      <option value="CID">CID</option>
       	      </select><br />

	      <input type="text" name="name" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(4)" />
              <input type="hidden" name="hidden" value="unchanged" />
	      </form><br />

<hr />
Get Clan Info:
<br />
	      <form action="index.php?pan=clan&&act=info" method="post" name="myformd">
      	      <select name="val" size="1">
       	      <option selected value="cName">Character Name</option>

       	      <option value="CID">CID</option>
       	      <option value="Name">Clan Name</option>
       	      <option value="CLID">CLID</option>
       	      </select>
	      <br />
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