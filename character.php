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
	//echo $_SESSION['UserID'];
	function alphabeta($test){
	     //$test = "ss*~!@#$%&*()+||%%12321421412##!@~!~@!@#!sadsa12312321".'"'."'".":;[]{}<>-+=_\'";
	     //echo $test."<br/><br/>";
	     $arr = array ("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "[", "]", "/", "`", ".", "<", ">", "'", '"', "|", ";", "=", "-", "_", "+", ":", ",", "{", "}", "~"," ", "echo", "select", "delete from", "insert", "like", "limit", "ORDER BY", "CREATE", "update", "set", "group by", "asc", "desc", "union", "\\");
	     //echo "1";
	     $asd = str_replace($arr, "", $test);
	     return $asd;
	}
	//echo $asd;
	/*$lol = str_replace("!|@|#|$|%|^|&|*|(|)|[|]|\|/|`|.|<|>|''", "matan" , $test);
if($lol){
	  echo "OK<br/>";
	  echo $lol;
	  }
	 else 
	   echo "not OK!";*/
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
  document.getElementById(num).value=a;
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
<b>Welcome <?php echo $_SESSION[UserID]."."; ?></b><br />
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
<br />
<br />
<br />

<center>

Change Character
	      <form action="?act=newval" method="post" name="myform">
      	      <select name="bval" size="1">
       	      <option selected value="Name">Name</option>
       	      <option value="BP">Bounty</option>
       	      <option value="XP">Exp</option>
       	      <option value="Level">Level</option>

       	      <option value="HP">HP</option>
       	      <option value="AP">AP</option>
       	      <option value="Gender">Gender: 0-Man 1-Female</option>
       	      </select>
<br />
By
      	      <select name="val" size="1">
       	      <option selected value="Name">Character Name</option>

       	      <option value="CID">CID</option>
       	      </select><br />
	      <input type="text" name="id" />
	      <br />New Value:<br />
	      <input type="text" name="nid" />
	      <input type="submit" name="submit" value="Go" onclick="return reasonenter(0)" />
              <input type="hidden" name="hidden0" id="0" value="unchanged" />
	      </form><br />
<?php
if(isset($_POST['submit'])){
    $newbol = false;
    if($_POST['id']==""){
	    echo "You Must Fill the CID/Character For The Update!";
		$newbol = true;
	}
	else if($_POST['nid']==""){
	    echo "You Must Fill The New Value For The Update!";
		$newbol = true;	
	}
	$charname = alphabeta($_POST['id']);
	$newval = alphabeta($_POST['nid']);
	$reason1 = $_POST['hidden0'];
	$found2 = false;
	//$ge ="";
	if($reason1 != "")
	   $found2  = true;
	$boolean = false;
	$found = false;
	if($_POST['val']=="Name"){
	  if(mssql_num_rows(mssql_query("SELECT * FROM Character WHERE Name = '$charname'"))>0)
	      $found = true;
	}
	else if($_POST['val']=="CID"){
	  if(mssql_num_rows(mssql_query("SELECT * FROM Character WHERE CID = '$charname'"))>0)
	      $found = true;
	}
	if(!$found&&$newbol == false){
	   echo "Character ".$_POST['val']." does not exist!";
	   }
	   else if(!$found2)
	    echo "You Must Enter The Reason!";
	   else if($newbol == false){
	if($_POST['bval']=="Name"){
	     if($_POST['val']=="Name"){
		     if(strlen($newval)>12){
			      echo "The New Char Name Must Be Less Then 12 Letters!";
				  $newbol = true;
			    }
			 else if(strlen($charname)>12){
			      echo "The Char Name That you entred needs to be less then 12 letters!";
				  $newbol = true;
			    }
			 else{
		          $update = mssql_query("UPDATE Character SET Name = '$newval' WHERE Name = '$charname'");
			      $msg = "The Name Of $charname Has Been Changed To $newval.";
			      $boolean = true;
			 }
		 }
		 else if($_POST['val']=="CID"){
		          $update = mssql_query("UPDATE Character SET Name = '$newval' WHERE CID = '$charname'");
			      $msg = "The Name Of The CID $charname Has Been Changed To $newval.";
			      $boolean = true;
		 }
	}
	else if($_POST['bval']=="BP"){
	     if($newval > 2147483647){
		    echo "The Maximum Bounty that you can to put is: 2147483647";
			$newbol = true;
		 }
	     else if($_POST['val']=="Name"){
		          if(strlen($charname)>12){
			           echo "The Char Name That you entred needs to be less then 12 letters!";
				       $newbol = true;
				   }
		          else{
		               $update = mssql_query("UPDATE Character SET BP = '$newval' WHERE Name = '$charname'");
			           $msg = "The Bounty Of $charname Has Been Changed To $newval.";
			            $boolean = true;
			    }//BP MAX=2147483647      HP&AP MAX=32767      Level MAX=99     EXP MAX=2147483647      Gender: 0=Male, 1=Female
		 }
		 else if($_POST['val']=="CID"){
		          $update = mssql_query("UPDATE Character SET BP = '$newval' WHERE CID = '$charname'");
			      $msg = "The Bounty Of The CID $charname Has Been Changed To $newval.";
			      $boolean = true;
		 }
	}
	else if($_POST['bval']=="XP"){
	     if($newval > 2147483647){
		     echo "The Maximum EXP that you can put is: 2147483647";
			 $newbol = true;
		 }
	     else if($_POST['val']=="Name"){
		          if(strlen($charname)>12){
			            echo "The Char Name That you entred needs to be less then 12 letters!";
				        $newbol = true;
				    }
			      else{
		                $update = mssql_query("UPDATE Character SET XP = '$newval' WHERE Name = '$charname'");
			            $msg = "The EXP Of $charname Has Been Changed To $newval.";
			            $boolean = true;
			    }
		 }
		 else if($_POST['val']=="CID"){
		          $update = mssql_query("UPDATE Character SET XP = '$newval' WHERE CID = '$charname'");
			      $msg = "The EXP Of The CID $charname Has Been Changed To $newval.";
			      $boolean = true;
		 }
	}
	else if($_POST['bval']=="Level"){
	     if($newval > 99){
		     echo "The Maximum Level that you can put is: 99";
			 $newbol = true;
		 }
	     else if($_POST['val']=="Name"){
		          if(strlen($charname)>12){
			              echo "The Char Name That you entred needs to be less then 12 letters!";
				          $newbol = true;
				    }
			      else{
		                  $update = mssql_query("UPDATE Character SET Level = '$newval' WHERE Name = '$charname'");
			              $msg = "The Level Of $charname Has Been Changed To $newval.";
			              $boolean = true;
			    }
		 }
		 else if($_POST['val']=="CID"){
		          $update = mssql_query("UPDATE Character SET Level = '$newval' WHERE CID = '$charname'");
			      $msg = "The Level Of The CID $charname Has Been Changed To $newval.";
			      $boolean = true;
		 }
	}
	else if($_POST['bval']=="HP"){
	     if($newval > 32767){
		     echo "The Maximum HP that you can put is: 32767";
			 $newbol = true;
		 }
	     else if($_POST['val']=="Name"){
		          if(strlen($charname)>12){
			              echo "The Char Name That you entred needs to be less then 12 letters!";
				          $newbol = true;
				    }
				  else{
		                  $update = mssql_query("UPDATE Character SET HP = '$newval' WHERE Name = '$charname'");
			              $msg = "The HP Of $charname Has Been Changed To $newval.";
			              $boolean = true;
			    }
		 }
		 else if($_POST['val']=="CID"){
		          $update = mssql_query("UPDATE Character SET HP = '$newval' WHERE CID = '$charname'");
			      $msg = "The HP Of The CID $charname Has Been Changed To $newval.";
			      $boolean = true;
		 }
	}
	else if($_POST['bval']=="AP"){
	     if($newval > 32767){
		     echo "The Maximum AP that you can put is: 32767";
			 $newbol = true;
		 }
	     else if($_POST['val']=="Name"){
		          if(strlen($charname)>12){
			             echo "The Char Name That you entred needs to be less then 12 letters!";
				         $newbol = true;
				   }
				  else{
		                 $update = mssql_query("UPDATE Character SET AP = '$newval' WHERE Name = '$charname'");
			             $msg = "The AP Of $charname Has Been Changed To $newval.";
			             $boolean = true;
			    }
		 }
		 else if($_POST['val']=="CID"){
		     $update = mssql_query("UPDATE Character SET AP = '$newval' WHERE CID = '$charname'");
			 $msg = "The AP Of The CID $charname Has Been Changed To $newval.";
			 $boolean = true;
		 }
	}
	else if($_POST['bval']=="Gender"){
	      if($newval==1)
		      $ge = "Female";
		  else if($newval==0)
			  $ge = "Male";
		 if($ge!="Male"&&$ge!="Female"){
		     echo "For Choose Grade you must choose: 0-Male or 1-Female";
			 $newbol = true; 
		 }
	     else if($_POST['val']=="Name"){
		          if(strlen($charname)>12){
			            echo "The Char Name That you entred needs to be less then 12 letters!";
				        $newbol = true;
			       }
				  else{
		                $update = mssql_query("UPDATE Character SET Sex = '$newval' WHERE Name = '$charname'");
			            $msg = "The AP Of $charname Has Been Changed To $ge.";
			            $boolean = true;
			    }
		 }
		 else if($_POST['val']=="CID"){
		     $update = mssql_query("UPDATE Character SET Sex = '$newval' WHERE CID = '$charname'");
			 $msg = "The Gender Of The CID $charname Has Been Changed To $ge.";
			 $boolean = true;
		 }
	}
	if($update&&$boolean == true){
	    $select_much = mssql_query("SELECT MAX(ID) FROM PanelLog");
		$me = mssql_fetch_row($select_much);
		$maxid = $me[0]+1;
	    //$time = date ("Y-m-d H:i:s");
	    $inserti = mssql_query("INSERT INTO PanelLog (ID, Account, Name, LogP, Reason, Time, LastVa, AfterVa, Section) VALUES('$maxid', '$userid', '$myname', '$msg', '$reason1', CURRENT_TIMESTAMP, NULL, '$newval', 'Character')");
		if($inserti)
	        echo "Your Changes Updated Successfully";
		 else
		   echo "Cannot Update!";
	}
	else if(!$newbol)
	  echo "Wrong Name/CID!";
    }

}
?>
<hr />

Add Exp By:
	      <form action="?act=addexp" method="post" name="myform">
<br />
      	      <select name="val3" size="1">
       	      <option selected value="Name">Character Name</option>
       	      <option value="CID">CID</option>
       	      </select><br />
	      <input type="text" name="id2" />

	      <br />EXP To ADD<br />
	      <input type="text" name="nid2" />
	      <input type="submit" name="submit2" value="Go" onclick="return reasonenter(2)" />
              <input type="hidden" name="hidden2" id="2" value="unchanged" />
	      </form><br />
		  
<?php
if(isset($_POST['submit2'])){
	//2147483647
	if($_POST['id2'] == "" || $_POST['nid2'] == "")
		die("Please fill all the fields!");
	$exp_char = alphabeta($_POST['id2']);
	$exp = alphabeta($_POST['nid2']);
	if($_POST['val3'] == "Name"){
		
	}
}

?>
<hr />
Color Character For Time:
<br />
	      <form action="?act=color" method="post" name="myform">
		  1.<input type="radio" name="test" value="1">
      	      <select name="bval" size="1">
       	      <option selected value="^1">Red</option>
       	      <option value="^2">Green</option>
       	      <option value="^3">Blue</option>
       	      <option value="^4">Yellow</option>
       	      <option value="^5">Dark Red</option>
       	      <option value="^6">Dark Green</option>

       	      <option value="^7">Dark Blue</option>
       	      <option value="^8">Dark Yellow</option>
       	      <option value="^9">White</option>
       	      <option value="^0">Gray</option>
       	      </select></br>Or You Can Try It On Your Way:<br/>
		 2.<input type="radio" name="test" value="2"> ^<input type="text" name="colorop" maxlength="1" size="1">
		 
<br />
Time
      	      <select name="time" size="1">

       	      <option selected value="86400">Day</option>
       	      <option value="259200">3 Days</option>
       	      <option value="604800">Week</option>
       	      </select>

<br />
Character Name:
	      <input type="text" name="name" />
	      <input type="submit" name="submit3" value="Go" onclick="return reasonenter(3)" />

              <input type="hidden" name="hidden3" id="3" value="unchanged" />
	      </form><br />
<hr />
Switch Characters Account By:
<br />
New 
	      <form action="?act=switcha" method="post" name="myform">
      	      <select name="bval" size="1">
       	      <option selected value="AID">AID</option>
       	      <option selected value="UserID">UserID</option>

       	      </select>
	      <input type="text" name="nid" />
<br />
      	      <select name="val" size="1">
       	      <option selected value="Name">Name</option>
       	      <option selected value="CID">CID</option>
       	      </select>
 Of The Character: <br />

	      <input type="text" name="id3" />
	      <input type="submit" name="submit4" value="Go" onclick="return reasonenter(4)" />
              <input type="hidden" name="hidden4" id="4" value="unchanged" />
	      </form><br />
<hr />
Exp Lock Character:
<br />
	      <form action="?act=expban" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="Name">Character Name</option>

       	      <option value="CID">CID</option>
       	      </select><br />
	 For:
      	      <select name="time" size="1">
       	      <option selected value="86400">Day</option>
       	      <option value="259200">3 Days</option>
       	      <option value="604800">Week</option>

       	      <option value="0">Unlimit</option>
       	      </select><br />

	      <input type="text" name="choose" />
	      <input type="submit" name="submit5" value="Go" onclick="return reasonenter(5)" />
              <input type="hidden" name="hidden5" id="5" value="unchanged" />
	      </form><br />







<hr />
Get Character Info:
<br />
	      <form action="?act=info" method="post" name="myform">
      	      <select name="val" size="1">
       	      <option selected value="Name">Character Name</option>
       	      <option value="CID">CID</option>

       	      <option value="AID">AID</option>
       	      <option value="UserID">UserID</option>
       	      </select>
	      <br />
	      <input type="text" name="choose6" />
	      <input type="submit" name="submit6" id="6" value="Go" />
	      </form><br />
</font>

</p></td>
	</tr>
</table>
</center>
<?php
mssql_close();
?>
</body>
</html>