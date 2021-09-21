<?php

$img = '../files/logo.png';
$palette = detect_colors($img);
echo format_answer($palette);

function detect_colors($image){ 
	$palette = array();
	$size = getimagesize($image);
	$img = imagecreatefrompng($image);
	for($i = 0; $i < $size[0]; $i++) {
		for($j = 0; $j < $size[1]; $j++) {
			$thisColor = imagecolorat($img, $i, $j);
			$rgb = imagecolorsforindex($img, $thisColor);
			$color = sprintf('%02X%02X%02X', (round(round(($rgb['red'] / 0x33)) * 0x33)), round(round(($rgb['green'] / 0x33)) * 0x33), round(round(($rgb['blue'] / 0x33)) * 0x33));
			$palette[$color] = isset($palette[$color]) ? ++$palette[$color] : 1;
		}
	}
	return $palette;
}

function format_answer($palette){
	$format = json_encode($palette);
	return $format;
}