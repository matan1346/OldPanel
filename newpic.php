<?php

$im = imagecreatefrompng("asdas/Quality-gunz-bannerV11.png");
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);
$orange = imagecolorallocate($im,255,127,0);

// Make the background red
//imagefilledrectangle($im, 0, 0, 299, 99, 0);

// Path to our ttf font file
$font_file = 'C://WINDOWS/Fonts/Prototype.ttf';


function imagecreatefromfile($path, $user_functions = false)
{
    $info = getimagesize($path);
    
    if(!$info)
    {
        return false;
    }
    
    $functions = array(
        IMAGETYPE_GIF => 'imagecreatefromgif',
        IMAGETYPE_JPEG => 'imagecreatefromjpeg',
        IMAGETYPE_PNG => 'imagecreatefrompng',
        IMAGETYPE_WBMP => 'imagecreatefromwbmp',
        IMAGETYPE_XBM => 'imagecreatefromwxbm',
        );
    
    if($user_functions)
    {
        $functions[IMAGETYPE_BMP] = 'imagecreatefrombmp';
    }
    
    if(!$functions[$info[2]])
    {
        return false;
    }
    
    if(!function_exists($functions[$info[2]]))
    {
        return false;
    }
    
    return $functions[$info[2]]($path);
}



      // Draw the text 'PHP Manual' using font size 13
		$im2 = "asdas/Quality-gunz-bannerV2.png";
		$src = imagecreatefromfile($im2);
		list($width, $height) = getimagesize($im2) or die("error3");
	//	imagefttext($im, 12, 0, 40, 15, $orange, 'C://WINDOWS/Fonts/Prototype.ttf', 'Char Info:');
		imagefttext($im, 14, 0, 99, 32, $white, $font_file, 'Activity');// char name
		imagefttext($im, 14, 0, 99, 60, $white, $font_file, '99');//char level
		imagefttext($im, 14, 0, 86, 92, $white, $font_file, 'MatanFans');// char clan
		imagefttext($im, 14, 0, 95, 124, $white, $font_file, '55.95%');// 
		imagefttext($im, 14, 0, 127, 155, $white, $font_file, '12312412');
	//	imagefttext($im, 12, 0, 40, 110, $orange, 'C://WINDOWS/Fonts/Prototype.ttf', 'User Info:');
		imagefttext($im, 10, 0, 100, 175, $white, $font_file, '3');
		imagefttext($im, 10, 0, 230, 175, $white, $font_file, 'Leader');
		imagefttext($im, 10, 0, 83, 195, $red, $font_file, 'Offline');
		imagefttext($im, 10, 0, 205, 195, $orange, $font_file, 'Administrator');
		imagefttext($im, 14, -44, 296, 68, $black, $font_file, 'No Emblem');
		imagecopyresized($im, $src, 244.5, 48, 0, 0, 86, 75.5, $width, $height);
		
//imagefttext($im, 14, 0, 150, 30, $red, $font_file, 'asdasd');

// Output image to the browser
header('Content-Type: image/png');





imagepng($im);
imagedestroy($im);

// ---------------------------------- 0 - Regular, 2 - Jjang, 104 - Chat Banned, 105 - MAC Banned, 170 - VIP, 252 - Police, 253 - Banned, 254 - Game Master, 255 - Administrator.






?>