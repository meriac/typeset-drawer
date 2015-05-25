#!/bin/php
<?php

require('config.php');
require('render.php');

define('IMAGE_FILE_IN','input.png');
define('IMAGE_FILE_OUT','output.png');

/* calculate derieved metrics */
define('BOX_DX', (IMG_SIZE-BOX_BORDER-2*BOX_SPACE_X)/BOXES_X);
define('BOX_DY', (IMG_SIZE-BOX_BORDER-1*BOX_SPACE_Y)/BOXES_Y);

/* process single input file */
if(file_exists(IMAGE_FILE_IN))
	render_typset(IMAGE_FILE_IN, IMAGE_FILE_OUT);

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

