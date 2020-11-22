
<script type=text/javascript>
var msg = "you cant Hacked Here.";
if(document.layers) window.captureEvents(Event.MOUSEDOWN);

function no_click(e){
if (navigator.appName == 'Netscape' && ( e.which == 2 || e.which == 3))
{
alert(msg);return false;
}
if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3))
{
alert(msg);return false;
}
}
window.onmousedown=no_click;
document.onmousedown=no_click; </script> 
<body style="background-color: #800080; background-image: url('http://downfile.ijjimax.com/cms/arcade/gunz/images/61.Wall_Run_-_Gunz___X.jpg'); background-attachment: fixed">
<div align="center">
  <p><strong><font color="#FFFFFF">Download Page »<a href="/Download.php">Here</a>&laquo;</font></strong></p>
  <p>
    <?php
/*
This script was written by Alex.
All rights reserved. Any support can be requested via RageZone.

You're allowed to edit this script and modify the template.
However, you are NOT allowed to remove and/or edit my copyright.

Removing this copyright will be your death.
*/

//Edit to fit YOUR requirements.
/*$servername = "Your GunZ";
$accounttable = "Account";
$logintable = "Login";

//Edit these variables. If not, no regpage for you. (Or you're fuxpro with the same logins as me.)
$host = "XXXXX\SQLEXPRESS";
$user = "sa";
$pass = "XXXX";
$dbname = "GunzDB";*/
require('config.php');
$servername = "TestGunz";
$accounttable = "Account";
$logintable = "Login";
$connect = odbc_connect("Driver={SQL Server};Server={$host}; Database={$dbname}", $user, $pass) or die("Can't connect the MSSQL server.");

//The well-known antisql injection. Bad enough, it's needed.
function antisql($sql) {
$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|--|\\\\)/"),"",$sql);
$sql = trim($sql);
$sql = strip_tags($sql);
$sql = addslashes($sql);
return $sql;
}

//My favorite function. Get The Fuck Off. (Nothing personally :].)
function gtfo($wut) {
echo "<center><table width='500' cellpadding='5' cellspacing='0' border='0' style='border: 1px ;'>
<tr>
<td align=center width='100%' style='border-bottom: 1px solid black;'><b>Message</b></td>
</tr>
<tr>
<td width='100%'><center>$wut</center></td>
</tr>
</table>";
die();
}

//Check email function. This to prevent fake emails. (Remember the time YOU doing that?)
function checkemail($address) {
list($local, $host) = explode("@", $address);
$pattern_local = "^([0-9a-z]*([-|_]?[0-9a-z]+)*)(([-|_]?)\.([-|_]?)[0-9a-z]*([-|_]?[0-9a-z]+)+)*([-|_]?)$";
$pattern_host  = "^([0-9a-z]+([-]?[0-9a-z]+)*)(([-]?)\.([-]?)[0-9a-z]*([-]?[0-9a-z]+)+)*\.[a-z]{2,4}$";
$match_local = eregi($pattern_local, $local);
$match_host = eregi($pattern_host, $host);
if($match_local && $match_host) {
return 1;
}
else {
return 0;
}
}

//The num_rows() function for ODBC since the default one always returns -1.
function num_rows(&$rid) {

//We can try it at least, right?
$num= odbc_num_rows($rid);
if ($num >= 0) {
return $num;
}

if (!odbc_fetch_row($rid, 1)) {
odbc_fetch_row($rid, 0);
return 0;
}

if (!odbc_fetch_row($rid, 2)) {
odbc_fetch_row($rid, 0);
return 1;
}

$lo= 2;
$hi= 8192000;

while ($lo < ($hi - 1)) {
$mid= (int)(($hi + $lo) / 2);
if (odbc_fetch_row($rid, $mid)) {
$lo= $mid;
} else {
$hi= $mid;
}
}
$num= $lo;
odbc_fetch_row($rid, 0);
return $num;
}
?>
    <html>
    <head>
    </p>
</div>
<title><?=$servername?> Registration</title>
</head>
<body style="background-color: #800080; background-image: url('http://downfile.ijjimax.com/cms/arcade/gunz/images/61.Wall_Run_-_Gunz___X.jpg'); background-attachment: fixed">
<center>
<?php
//Oh well. Let's create the variable $ip to start with.
$ip = antisql($_SERVER['REMOTE_ADDR']);

/*
An extra feature. This is NOT enabled before you remove this + the comment thingy's.

To ban 1 IP it will be:
if ($ip == "127.0.0.1")
{
gtfo("Your IP is blacklisted.");
}

For multiple IP's, use this way:
if ($ip == "127.0.0.1" OR $ip == "127.0.0.1")
{
gtfo("Your IP is blacklisted.");
}
*/

//Get the AID out of the Login table (defined at the top of this file) where LastIP is the visitors IP.
$query1 = odbc_exec($connect,"SELECT AID FROM $logintable WHERE LastIP = '$ip'");

//Understable for the real people. Editing this without knowledge will be the death of your regpage.
$i=1;
while (odbc_fetch_row($query1, $i)){
$aid = odbc_result($query1, 'AID');

$query2 = odbc_exec($connect,"SELECT UGradeID FROM $accounttable WHERE AID = '$aid'");
odbc_fetch_row($query2);
$ugradeid = odbc_result($query2, 1);

if ($ugradeid == "253")
{
//Get the fuck off.
gtfo("You have one or more accounts banned here. You're not welcome anymore.");
}

$i++;
}

//The doreg part.
if (isset($_GET['act']) AND $_GET['act'] == "doreg")
{

//Check for any shit.
if (!is_numeric($_POST['age']) OR !checkemail($_POST['email']) OR empty($_POST['username']) OR empty($_POST['password']) OR empty($_POST['email']) OR empty($_POST['name']) OR empty($_POST['age']))
{
gtfo("You're not funny.");
}

//Check if the username exists already.
$query1 = odbc_exec($connect, "SELECT AID FROM $accounttable WHERE UserID = '" . antisql($_POST['username']) . "'");
$count1 = num_rows($query1);

if ($count1 >= 1)
{
gtfo("Username in use.");
}

//Check if the Email is in use.
$query2 = odbc_exec($connect, "SELECT AID FROM $accounttable WHERE Email = '" . antisql($_POST['email']) . "'");
$count2 = num_rows($query2);

if ($count2 >= 1)
{
gtfo("Email address in use.");
}

//Regdate


//Time for the real work. Editing this will be the end of your regpage.
$query3 = odbc_exec($connect, "INSERT INTO $accounttable (UserID, UGradeID, PGradeID, RegDate, Email, Age, Name) VALUES ('".antisql($_POST['username'])."', '0', '0', '11.03.2207 0:00:00', '".antisql($_POST['email'])."', '".antisql($_POST['age'])."', '".antisql($_POST['name'])."')");

$query4 = odbc_exec($connect, "SELECT AID FROM $accounttable WHERE UserID = '" . antisql($_POST['username']) . "'");
odbc_fetch_row($query4);
$aid = odbc_result($query4, 1);

//If no results comes back. (Registration failed.)
if (!$aid)
{
gtfo("Shit happened. Please report this bug at our forums.");
}

odbc_exec($connect, "INSERT INTO $logintable (UserID, AID, Password) VALUES ('".antisql($_POST['username'])."', '$aid', '".antisql($_POST['password'])."')");

//When everything is done, show the username/password to the visitor.
gtfo("Your account has been created.<br><br>
Username: $_POST[username]<br>
Password: $_POST[password]<br><br>
Have fun at $servername!");
}

//Here the party begins. Feel free to edit this.
echo "<table width='350'>
<form action='" . $_SERVER['PHP_SELF'] . "?act=doreg' method='POST'>
<b>Register an account at $servername.</b><br><br>
<tr>
<td width='50%'><b>Username:</b></td>
<td width='50%'><input type='text' name='username'></td>
</tr>
<tr>
<td width='50%'><b>Password:</b></td>
<td width='50%'><input type='password' name='password'></td>
</tr>
<tr>
<td width='50%'><b>E-mail:</b></td>
<td width='50%'><input type='text' name='email'></td>
</tr>
<tr>
<td width='50%'><b>Name:</b></td>
<td width='50%'><input type='text' name='name'></td>
</tr>
<tr>
<td width='50%'><b>Age:</b></td>
<td width='50%'><input type='text' name='age'></td>
</tr>
<tr>
<td width='50%'><b></b></td>
<td width='50%'><input type='submit' value='Register'></td>
</tr>
</table>";
?>
<br>
<!-- לא לשנות את זה -->
<font size="1">asdsadsa - <?php echo $servername;?>.</font>
<!-- See? -->
</center>
</body>
</html>