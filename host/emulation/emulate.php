#!/bin/php
<?php

require('config.php');

/* calculate derieved metrics */
define('BOX_DX', (IMG_SIZE-BOX_BORDER-2*BOX_SPACE_X)/BOXES_X);
define('BOX_DY', (IMG_SIZE-BOX_BORDER-1*BOX_SPACE_Y)/BOXES_Y);

if(($png = imagecreatefrompng('input.png'))===FALSE)
	exit("Can't open input image\n\r");

$src = imagecreatetruecolor(BOXES_X, BOXES_Y);
imagecopyresampled($src, $png, 0, 0, 0, 0, BOXES_X, BOXES_Y, imagesx($png), imagesy($png));

$dst = imagecreatetruecolor(IMG_SIZE, IMG_SIZE);
$white = imagecolorallocate ( $dst , 255, 255, 255 );

foreach($boxes as $box)
{
	list($px, $py, $width, $height) = $box;

	$x = $px * BOX_DX + BOX_BORDER; 
	$y = $py * BOX_DY + BOX_BORDER;

	/* add spacers */
	if($px>5)
		$x += BOX_SPACE_X;
	if($px>13)
		$x += BOX_SPACE_X;
	if($py>3)
		$y += BOX_SPACE_Y;

	/*/ calculate average color */
	$rgb = array(0,0,0);
	for($dx = 0; $dx<$width; $dx++)
		for($dy = 0; $dy<$height; $dy++)
		{
			$pixel = imagecolorat($src, $px+$dx, $py+$dy );
			/* add RGB values */
			$rgb[0] += ($pixel >> 16) & 0xFF;
			$rgb[1] += ($pixel >>  8) & 0xFF;
			$rgb[2] += ($pixel >>  0) & 0xFF;
		}
	/* divide colors by amount */
	$count = $width * $height;
	$color = imagecolorallocate ( $dst,
		$rgb[0]/$count,
		$rgb[1]/$count,
		$rgb[2]/$count);

	imagefilledrectangle(
		$dst,
		$x, $y,
		$x + ($width  * BOX_DX)-BOX_BORDER,
		$y + ($height * BOX_DY)-BOX_BORDER,
		$color);
}

if(!imagepng($dst, 'output.png'))
	exit("Failed to write output img\n\r");
