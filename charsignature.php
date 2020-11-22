<html>
<head>
<title> Create A Signture For You Own Char! </title>

<style type="text/css" rel="stylesheet">
#tryme { background-color: #000000; font-size: 100%;
    padding: 0px; font-weight: bold; width:360px; height: 20px; }
	</style>
</head>
<script type="text/javascript">
function ShowDesign(str, str2)
{

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
    document.getElementById("mychoose").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","exam.php?design1="+str+"&name="+str2,true);
xmlhttp.send();
}



</script>

<script>
function changeColor(color, name)
{
  if(name=="")
       document.getElementById("tryme").innerHTML="<span id='color1'>Your Color: Character</span>";
  else if(name!="")
       document.getElementById("tryme").innerHTML="<span id='color1'>Your Color: "+name+"</span>";
  document.getElementById("color1").style.color=color;
}


</script>


<body>
<center>

<form action="?act=creat" method="post">






<table>
		<tr>
			<td>Character Name:</td><td><input type="text" id="asd123" name="character" size="26" maxlength="16"/></td>
		</tr>
	  
		<tr>
	        <td>Example:</td> <td><select name="design" size="1" onchange="ShowDesign(this.value,character.value)">
				<option selected value="">Choose A Design!</option>
				<option value="V1">Design V1</option>
				<option value="V2">Design V2</option>
				<option value="V3">Design V3</option>
				<option value="V4">Design V4</option>
				<option value="V5">Design V5</option>
			</td>
		</tr>
		<tr>
			<td></td> <td><div id="mychoose">Choose Your Signature Design!</div></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="radio" name="lol" value="1"  checked/><input type="text" name="color" id='color32' size="15" maxlength="6" onmousemove="changeColor(this.value)"> <button onClick="changeColor(color32.value, asd123.value)">Check</button></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="radio" name="lol" onclick="changeColor('000000')" value="2"/>Default Color:<select name="mym" onChange="changeColor(this.value, asd123.value)">
                            <option value="FFFFFF">set value color &nbsp; &nbsp;</option>
                            <option value="FFB751">V1</option>                        
                            <option value="6fd5ff">V2</option>
                            <option value="52ff52">V3</option>
							<option value="ff6666">V4</option>
							<option value="e289ff">V5</option>
							</select></td>
		</tr>
		


















</table>

<p><input type="submit" name="submit" value="Create Signature"></p>
</form>
<?php
function toRGB($Hex){   
if (substr($Hex,0,1) == "#")
    $Hex = substr($Hex,1);
    
    

$R = substr($Hex,0,2);
$G = substr($Hex,2,2);
$B = substr($Hex,4,2);

$R = hexdec($R);
$G = hexdec($G);
$B = hexdec($B);

$RGB['R'] = $R;
$RGB['G'] = $G;
$RGB['B'] = $B;

return $RGB;

} 
if(!isset($_POST['submit'])){

if($_POST['character']!=""){
     $char1 = $_GET['character'];
     echo "<div id='tryme'><span id='color1'>Your Color: $char1</span></div>";
	}
else if($_POST['character']==""){
     echo "<div id='tryme'><span id='color1'>Your Color: Character</span></div>";
}
}
else if(isset($_POST['submit'])){
$col = $_POST['mym'];
echo "<div id='tryme'><font color='#$col'>$name</font></div>";
if($_POST['lol']==2){
$RGB = toRGB($_POST['mym']);
echo "R = " . $RGB['R'] . "<br />";
echo "G = " . $RGB['G'] . "<br />";
echo "B = " . $RGB['B'] . "<br />";  
echo "<br/><br/> You Choosed The Selection Field!";
}
else if($_POST['lol']==1){
$RGB = toRGB($_POST['color']);
echo "R = " . $RGB['R'] . "<br />";
echo "G = " . $RGB['G'] . "<br />";
echo "B = " . $RGB['B'] . "<br />";  
echo "<br/><br/> You Choosed The text Field!<br/><br/>";

if($_POST['design']=="V1")
    $_POST['design']="";
include('functions.php');
$im = imagecreatefrompng("asdas/Quality-gunz-banner".getdesign($_POST['design']).".png");
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$orange = imagecolorallocate($im, $RGB['R'], $RGB['G'], $RGB['B']);

// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);

// Path to our ttf font file
$font_file = 'C://WINDOWS/Fonts/Prototype.ttf';


      // Draw the text 'PHP Manual' using font size 13
      imagefttext($im, 12, 0, 105, 25, $red, $font_file, 'No Data');
      imagefttext($im, 12, 0, 105, 60, $red, $font_file, 'No Data');
	  imagefttext($im, 12, 0, 105, 95, $red, $font_file, 'No Data');
	  imagefttext($im, 12, 0, 105, 129, $red, $font_file, 'No Data');



// Output image to the browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);


}
}
?>
<!-- FFFFFF  /-->







</body>
</html>