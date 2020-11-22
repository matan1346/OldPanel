<?php
session_start();


if(!is_numeric($_GET['mode']) || !is_numeric($_GET['design']) || !is_numeric($_GET['cid'])){
   die("Only Numbers in the URL!");
}
//if the cid is a float so the float will be floor to int.
$_GET['mode'] = floor($_GET['mode']);
$_GET['design'] = floor($_GET['design']);
$_GET['cid'] = floor($_GET['cid']);

function getMac(){
exec("ipconfig /all", $output);
foreach($output as $line){
if (preg_match("/(.*)Physical Address(.*)/", $line)){
$mac = $line;
$mac = str_replace("Physical Address. . . . . . . . . :","",$mac);
}
}
return $mac;
}

$mac = getMac();
$mac = trim($mac);

//echo $mac;


if($_GET['mode'] == 1 && $_GET['design'] > 5)
	die("<center><strong>Please Choose The Correct design for the first mode!");
else if($_GET['mode'] == 2 && $_GET['design'] < 6)
	die("<center><strong>Please Choose The Correct design for the second mode!");
else if($_GET['design'] > 10)
    die("<center><strong>You Can Only Choose 10 Designs for now with the correct mode!");
else if($_GET['mode'] != 1 && $_GET['mode'] != 2)
    die("<center><strong>You Can Only Choose 2 Modes for now with the correct designs!");

require('functions.php');


$_GET['design'] = "V".$_GET['design'];

//$im = imagecreatefrompng("asdas/Quality-gunz-banner".$_GET['design'].".png");
//$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
//$orange = imagecolorallocate($im, 255, 183, 81);
$choose = $_GET['mode'];
$x1 = x($choose, 1);
$x2 = x($choose, 2);
$x3 = x($choose, 3);
$x4 = x($choose, 4);
$y1 = y($choose, 1);
$y2 = y($choose, 2);
$y3 = y($choose, 3);
// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);
$y4 = y($choose, 4);

// Path to our ttf font file
//$font_file = 'C://WINDOWS/Fonts/Prototype.ttf';


      // Draw the text 'PHP Manual' using font size 13




// ------------------------------------------------------------------------------------------------------------------------------------------



//get the cid from the url
$cid  = $_GET['cid'];

//let the system die if the cid = to a string
if(!is_numeric($cid)){
   die("Dont Try To Hack This Site");
}
//if the cid is a float so the float will be floor to int.
$cid = floor($cid);

//
$check1 = false;
$check2 = false;
$check3 = true;
require('config.php');
$con = mssql_query("SELECT * FROM Character WHERE CID = $cid ")or die(mssql_error());
$row = mssql_fetch_assoc($con);
$aid1 = $row['AID'];
$checkadd = mssql_query("SELECT MacAddress FROM Account WHERE AID = '$aid1'")or die(mssql_error());
$mylog = mssql_fetch_row($checkadd);
if($mac != $mylog[0])
	$check3 = false;
if(mssql_num_rows($con) > 0 && $check3 == true){
    $check1 = true;
    $clanmem = mssql_query("SELECT * FROM ClanMember WHERE CID = $cid")or die(mssql_error());
	if(mssql_num_rows($clanmem) > 0){
	     $check2 = true;
		 $row2 = mssql_fetch_assoc($clanmem);
		 $hadarsexy = $row2['CLID'];
		 $claninfo = mssql_query("SELECT * FROM Clan WHERE CLID = '$hadarsexy'")or die(mssql_error());
		 if(!$claninfo){
		    $check2 = false;
		 }else{
		    $row3 = mssql_fetch_assoc($claninfo);
		 }
	}
    
}
mssql_close();
//include('functions.php');

if($check1 && $check3){
$mydesign = getdesign($_GET['design']);
$mycolor1 = getcolor($mydesign, 1);
$mycolor2 = getcolor($mydesign, 2);
$mycolor3 = getcolor($mydesign, 3);
// Create a 300x100 image
$im = imagecreatefrompng("asdas/Quality-gunz-banner".$mydesign.".png");
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$orange = imagecolorallocate($im, $mycolor1, $mycolor2, $mycolor3);

// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);

// Path to our ttf font file
$font_file = 'C://WINDOWS/Fonts/arial.ttf';


	  if(!$check2)
	      $row3['Name'] = "- -";
      if($row['Ranking'] == 0)
	      $row['Ranking'] = "- -";

      imagefttext($im, 12, 0, $x1, $y1, $orange, $font_file, $row['Name']);
	  if($choose == 1){
		imagefttext($im, 12, 0, $x2, $y2, $orange, $font_file, $row['Level']);
		imagefttext($im, 12, 0, $x3, $y3, $orange, $font_file, $row3['Name']);
	  }
	  else{
		imagefttext($im, 12, 0, $x2, $y2, $orange, $font_file, $row3['Name']);
		imagefttext($im, 12, 0, $x3, $y3, $orange, $font_file, $row['Level']);
	  }
	  imagefttext($im, 12, 0, $x4, $y4, $orange, $font_file, $row['Ranking']);



// Output image to the browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
}
else if(!$check1&&$check3){
$im = imagecreatefrompng("asdas/Quality-gunz-banner".getdesign($_GET['design']).".png");
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$orange = imagecolorallocate($im, 255, 183, 81);

// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);

// Path to our ttf font file
$font_file = 'C://WINDOWS/Fonts/Prototype.ttf';


      // Draw the text 'PHP Manual' using font size 13
      imagefttext($im, 12, 0, $x1, $y1, $red, $font_file, 'No Data');
      imagefttext($im, 12, 0, $x2, $y2, $red, $font_file, 'No Data');
	  imagefttext($im, 12, 0, $x3, $y3, $red, $font_file, 'No Data');
	  imagefttext($im, 12, 0, $x4, $y4, $red, $font_file, 'No Data');



// Output image to the browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
}
else if(!$check3){
	$im = imagecreatefrompng("asdas/Quality-gunz-banner".getdesign($_GET['design']).".png");
$red = imagecolorallocate($im, 255, 255, 255);
$orange = imagecolorallocate($im, 0x00, 0x00, 0x00);

// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);

// Path to our ttf font file
$font_file = 'C://WINDOWS/Fonts/Prototype.ttf';


      // Draw the text 'PHP Manual' using font size 13
	  if($choose==1)
		imagefttext($im, 20, 0, 22, 70, $red, $font_file, 'This is not your Character.');
	  else
		imagefttext($im, 20, 0, 100, 70, $red, $font_file, 'This is not your Character.');



// Output image to the browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
}


?>