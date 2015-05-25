#!/bin/php
<?php

require('config.php');
require('render.php');

define('IMAGE_FILE_IN','input.png');
define('IMAGE_FILE_OUT','output.png');

/* calculate derieved metrics */
define('BOX_DX', (IMG_SIZE-BOX_BORDER-2*BOX_SPACE_X)/BOXES_X);
define('BOX_DY', (IMG_SIZE-BOX_BORDER-1*BOX_SPACE_Y)/BOXES_Y);

function print_header($colors)
{
	echo "#ifndef __TYPESET_BOX_H__\r\n";
	echo "#define __TYPESET_BOX_H__\r\n\r\n";

	echo "#define MAX_BOXES ".count($colors)."\r\n\r\n";

	echo "const uint8_t g_box_leds[MAX_BOXES] = {";
	echo implode(',',$colors);
	echo "};\r\n\r\n";

	echo "#endif/*__TYPESET_BOX_H__*/\n\r";
}

/* process single input file */
if(file_exists(IMAGE_FILE_IN))
{
	$gray = array();

	$res = render_typset(IMAGE_FILE_IN, IMAGE_FILE_OUT);
	if($res)
	{
		foreach($res as $rgb)
			$gray[] = intval(($rgb[0] + $rgb[1] + $rgb[2])/3);

		print_header($gray);
	}
}

/* process animation files */
$pos = 0;
while(TRUE)
{
	/* get input file */
	$file_in = "cache/animation-$pos.png";
	if(!file_exists($file_in))
		break;

	/* get output file name */
	$file_out = "cache/output-$pos.png";

	/* increment file counter */
	$pos++;

	/* skip processed files */
	if(file_exists($file_out) &&
		(filectime($file_out) >= filectime($file_in)) )
		continue;

	echo "processing $file_in...\n";
	render_typset($file_in, $file_out);
}

