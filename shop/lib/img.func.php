<?php 
require_once 'string.php';

function verifyImage($type=1, $length=4, $pixel=20, $line=5){
session_start();
$width = 80;
$height = 28;
$image = imagecreatetruecolor($width, $height);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);

$chars = getChars($type, $length);
$name = 'verify';
$_SESSION[$name] = $chars;
$fontfiles = array('MSYH.TTC', 'MSYHBD.TTC','MSYHL.TTC');
for($i=0; $i<$length; $i++){
	$size = mt_rand(12, 16);
	$angle = mt_rand(-15, 15);
	$x =5+$size*$i;
	$y = mt_rand(16, 25);
	$color = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
	$fontfile = '../font/'.$fontfiles[mt_rand(0, count($fontfiles)-1)];
	$text = substr($chars, $i, 1);
 	imagettftext($image, $size, $angle, $x, $y, $color, '../font/MSYH.TTC', $text);	
}

if($pixel){
	for($i=0; $i<$pixel; $i++){
		imagesetpixel($image, mt_rand(1, $width-1),mt_rand(1,$height-1), $black);
	}
	
}
if($line){
	for($i=0; $i<$line; $i++){
		$color = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
		imageline($image, mt_rand(1,$width-2), mt_rand(1, $height-2), mt_rand(1, $width-2), mt_rand(1,$height-2), $color);
	}
}
header("content-type:image/gif");
imagegif($image);
imagedestroy($image);
}
