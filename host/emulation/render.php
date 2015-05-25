<?php

function render_typset($src_file, $dst_file = FALSE)
{
	global $boxes;

	/* read source image from file - expects to be square */
	if(!is_string($src_file))
		$png = $src_file;
	else
	{
		if(($png = imagecreatefrompng($src_file))===FALSE)
			return FALSE;
	}

	$src = imagecreatetruecolor(BOXES_X, BOXES_Y);
	imagecopyresampled($src, $png, 0, 0, 0, 0, BOXES_X, BOXES_Y, imagesx($png), imagesy($png));

	if($dst_file)
		$dst = imagecreatetruecolor(IMG_SIZE, IMG_SIZE);

	/* resulting frame */
	$res = array();

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

		/* divide colors by pixel count */
		$count = $width * $height;
		$rgb[0] = intval($rgb[0]/$count);
		$rgb[1] = intval($rgb[1]/$count);
		$rgb[2] = intval($rgb[2]/$count);

		/* store RGB pixel in output array */
		$res[] = $rgb;

		if($dst_file)
		{
			/* draw pixel in output image according to colour */
			$color = imagecolorallocate ( $dst, $rgb[0], $rgb[1], $rgb[2]);

			/* draw single box */
			imagefilledrectangle(
				$dst,
				$x, $y,
				$x + ($width  * BOX_DX)-BOX_BORDER,
				$y + ($height * BOX_DY)-BOX_BORDER,
				$color);
		}
	}

	if($dst_file)
		imagepng($dst, $dst_file);

	return $res;
}
