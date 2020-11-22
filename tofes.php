<?php
session_start();
?>

<html>
<head>
<title> My Character Signature</title>

<script type="text/javascript">
function showDesign(d, c)
{
var m;

if(d>=6 && d<= 10){
	  m=2;
}
else if(d>=1 && d<=5){
      m=1;
}
else
     m="";

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("showdesign").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","sendme.php?m="+m+"&d="+d+"&c="+c,true);
xmlhttp.send();
}

function changeimg(num){
if(num == 1)
       document.getElementById("img").src="asdas/QualityGunzButtomForMatan2.png";
else
      document.getElementById("img").src="asdas/QualityGunzButtomForMatan.png";
}

</script>

</head>
<body>
<center>
<?php
if($_SESSION[UserID] != "")
{
	$aid = $_SESSION[AID];
?>
<table>
		
		<tr>
	        <td>Character Name:</td> <td><select name="design" id='char' size="1">
				<option selected value="">Choose Character!</option>
				<?php
				require('config.php');
				$getinfo = mssql_query("SELECT * FROM Character WHERE AID = '$aid'")or die(mssql_error());
				$num = mssql_num_rows($getinfo);
				$i = 0;
				while($i < $num){
				     $row = mssql_fetch_assoc($getinfo);
					 $cid = $row['CID'];
					 $name = $row['Name'];
					 echo "<option value='$cid'>$name</option>";
					 $i++;
				}
				mssql_close();
				?>
			</td>
		</tr>
		<tr>
			<td>Design Version:</td> <td><select name="design" size="1" id='des'>
				<option selected value="">Choose A Design!</option>
				<option value="1">Design V1</option>
				<option value="2">Design V2</option>
				<option value="3">Design V3</option>
				<option value="4">Design V4</option>
				<option value="5">Design V5</option>
				<option value="6">Design V6</option>
				<option value="7">Design V7</option>
				<option value="8">Design V8</option>
				<option value="9">Design V9</option>
				<option value="10">Design V10</option>
			</td>
		</tr>
		
</table>
<p><input type='image' alt="[Submit]"
 onClick="showDesign(des.value,char.value)" id="img" title="Create Signature!" src='asdas/QualityGunzButtomForMatan.png' onmouseover="changeimg(1)" onmouseout="changeimg(2)"/></p>
<br/><br/>
<div id='showdesign'>Choose A Character And A Design!</div>
		
<?php
}
else{
if(!function_exists("alertbox")){
function alertbox($text, $url)
{
    echo "<script>alert('$text');document.location = '$url'</script>";
    die("Javascript disabled");
}
}



	   alertbox("You Must Login First","login.php");
      die();



}
//echo "<img src='newmode.php?mode=1&design=2&cid=2'>";
?>

</body>
</html>