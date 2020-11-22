<?php
header('Content-type: image/png');
$text = $_GET['text'];

$im = imagecreatefrompng ("userbar.png");

if($text == "ADMINISTRATOR"){
	$color = imagecolorallocate($im, 255, 0, 0);
	} 
elseif($text == "MODERATOR"){
	$color = imagecolorallocate($im, 0, 0, 255);
	} 
elseif($text == "JUNKIE"){
	$color = imagecolorallocate($im, 0, 0, 0);
	} 
else {
	$color = imagecolorallocate($im, 0, 128, 0);
	}
	
$font = 'font.ttf';
$fontsize = 6;
$size = imagettfbbox($fontsize, 0, $font, $text); //calculate the pixel of the string
$dx = (imagesx($im)) - (abs($size[2]-$size[0])) - 20; //calculate the location to start the text
imagettftext($im, $fontsize, 0, $dx, 13, $color, $font, $text);
imagepng($im);
imagedestroy($im);
?>