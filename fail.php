<?php
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
require('config.php');
$con = mssql_query("SELECT * FROM Character WHERE CID = $cid ")or die(mssql_error());
if(mssql_num_rows($con) > 0){
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
include('functions.php');

if($check1){
$mydesign = getdesign($_GET['design']);
$mycolor1 = getcolor($mydesign, 1);
$mycolor2 = getcolor($mydesign, 2);
$mycolor3 = getcolor($mydesign, 3);
$row = mssql_fetch_assoc($con);
// Create a 300x100 image
$im = imagecreatefrompng("asdas/Quality-gunz-banner".$mydesign.".png");
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$orange = imagecolorallocate($im, $mycolor1, $mycolor2, $mycolor3);

// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);

// Path to our ttf font file
$font_file = 'C://WINDOWS/Fonts/arial.ttf';


      // Draw the text 'PHP Manual' using font size 13
      imagefttext($im, 12, 0, 105, 25, $orange, $font_file, $row['Name']);
      imagefttext($im, 12, 0, 105, 60, $orange, $font_file, $row['Level']);
	  if($check2){
      imagefttext($im, 12, 0, 105, 95, $orange, $font_file, $row3['Name']);
	  }
	  else{
	  imagefttext($im, 12, 0, 105, 95, $orange, $font_file, "- -");
	  }
	  if($row['Ranking']!=0){
      imagefttext($im, 12, 0, 105, 129, $orange, $font_file, $row['Ranking']);
	  }
	  else{
	  imagefttext($im, 12, 0, 105, 129, $orange, $font_file, "- -");
	  }



// Output image to the browser
header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
}
else{
$im = imagecreatefrompng("asdas/Quality-gunz-banner".getdesign($_GET['design']).".png");
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$orange = imagecolorallocate($im, 255, 183, 81);

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



?>