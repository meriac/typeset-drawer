#!/bin/php
<?php

require('config.php');
require('render.php');

define('OVERSAMPLING', 4);
define('FONT_FILE', 'fonts/SansitaOne.ttf');

$text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit --- ";

$size = imagettfbbox( BOXES_Y * OVERSAMPLING, 0, FONT_FILE, $text);
$width = abs($size[4] - $size[0]);
$height = abs($size[5] - $size[1]);

$src = imagecreatetruecolor($width, $height);
$color = imagecolorallocate($src, 0xFF, 0xFF, 0xFF);
imagettftext ( $src, BOXES_Y * OVERSAMPLING, 0 , 0, $height - $size[1], $color, FONT_FILE, $text );

for($x=0; $x<$width; $x++)
{
	$frame = imagecreatetruecolor($height, $height);
	imagecopy($frame, $src, 0, 0, $x, 0, $height, $height);

	printf("rendering frame %3.1f%%\n", 100*($x / $width)); 
	render_typset($frame, "cache/animation-$x.png");
}


