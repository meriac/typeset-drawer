<?php

/* output image size is (IMG_SIZE x IMG_SIZE) */
define('IMG_SIZE', 1080);

/* typsetting boxes in X and Y direction */
define('BOXES_X', 20);
define('BOXES_Y', 10);

/* border between boxes */
define('BOX_BORDER', 10);

/* second grade spaces */
define('BOX_SPACE_X', 15);
define('BOX_SPACE_Y', 5);

/* calculate derieved metrics */
define('BOX_DX', (IMG_SIZE-BOX_BORDER-2*BOX_SPACE_X)/BOXES_X);
define('BOX_DY', (IMG_SIZE-BOX_BORDER-1*BOX_SPACE_Y)/BOXES_Y);

/* box configuration:
 * x, y, width, height 
 */
$boxes = array(
	array(  0, 0, 2, 1),
	array(  2, 0, 2, 1),
	array(  4, 0, 2, 1),
	array(  6, 0, 2, 1),
	array(  8, 0, 2, 1),
	array( 10, 0, 2, 1),
	array( 12, 0, 2, 1),
	array( 14, 0, 2, 1),
	array( 16, 0, 2, 1),
	array( 18, 0, 2, 1),

	array(  0, 1, 2, 1),
	array(  2, 1, 2, 1),
	array(  4, 1, 2, 1),
	array(  6, 1, 2, 1),
	array(  8, 1, 2, 1),
	array( 10, 1, 2, 1),
	array( 12, 1, 2, 1),
	array( 14, 1, 2, 1),
	array( 16, 1, 2, 1),
	array( 18, 1, 2, 1),

	array(  0, 2, 1, 1),
	array(  1, 2, 1, 1),
	array(  2, 2, 1, 1),
	array(  3, 2, 1, 1),
	array(  4, 2, 1, 1),
	array(  5, 2, 1, 1),
	array(  6, 2, 1, 1),
	array(  7, 2, 1, 1),
	array(  8, 2, 1, 1),
	array(  9, 2, 1, 1),
	array( 10, 2, 1, 1),
	array( 11, 2, 1, 1),
	array( 12, 2, 2, 1),
	array( 14, 2, 2, 1),
	array( 16, 2, 1, 1),
	array( 17, 2, 1, 1),
	array( 18, 2, 1, 1),
	array( 19, 2, 1, 1),

	array(  0, 3, 1, 1),
	array(  1, 3, 1, 1),
	array(  2, 3, 1, 1),
	array(  3, 3, 1, 1),
	array(  4, 3, 1, 1),
	array(  5, 3, 1, 1),
	array(  6, 3, 2, 1),
	array(  8, 3, 2, 1),
	array( 10, 3, 2, 1),
	array( 12, 3, 2, 1),
	array( 14, 3, 1, 1),
	array( 15, 3, 1, 1),
	array( 16, 3, 1, 1),
	array( 17, 3, 1, 1),
	array( 18, 3, 1, 1),
	array( 19, 3, 1, 1),

	array(  0, 4, 1, 1),
	array(  1, 4, 1, 1),
	array(  2, 4, 1, 1),
	array(  3, 4, 1, 1),
	array(  4, 4, 1, 1),
	array(  5, 4, 1, 1),
	array(  6, 4, 2, 2),
	array(  8, 4, 2, 2),
	array( 10, 4, 2, 2),
	array( 12, 4, 1, 1),
	array( 13, 4, 1, 1),
	array( 14, 4, 1, 1),
	array( 15, 4, 1, 1),
	array( 16, 4, 1, 1),
	array( 17, 4, 1, 1),
	array( 18, 4, 1, 1),
	array( 19, 4, 1, 1),

	array(  0, 5, 1, 1),
	array(  1, 5, 1, 1),
	array(  2, 5, 1, 1),
	array(  3, 5, 1, 1),
	array(  4, 5, 2, 1),
	array( 12, 5, 2, 1),
	array( 14, 5, 2, 1),
	array( 16, 5, 2, 1),
	array( 18, 5, 1, 1),
	array( 19, 5, 1, 1),

	array(  0, 6, 1, 1),
	array(  1, 6, 1, 1),
	array(  2, 6, 1, 1),
	array(  3, 6, 1, 1),
	array(  4, 6, 2, 1),
	array(  6, 6, 2, 2),
	array(  8, 6, 2, 1),
	array( 10, 6, 2, 2),
	array( 12, 6, 2, 2),
	array( 14, 6, 1, 1),
	array( 15, 6, 1, 1),
	array( 16, 6, 2, 1),
	array( 18, 6, 1, 1),
	array( 19, 6, 1, 1),

	array(  0, 7, 1, 1),
	array(  1, 7, 1, 1),
	array(  2, 7, 1, 1),
	array(  3, 7, 1, 1),
	array(  4, 7, 2, 1),
	array(  8, 7, 2, 1),
	array( 14, 7, 2, 1),
	array( 16, 7, 2, 1),
	array( 18, 7, 2, 1),

	array(  0, 8, 1, 1),
	array(  1, 8, 1, 1),
	array(  2, 8, 2, 1),
	array(  4, 8, 1, 1),
	array(  5, 8, 1, 1),
	array(  6, 8, 2, 2),
	array(  8, 8, 2, 2),
	array( 10, 8, 2, 2),
	array( 12, 8, 2, 2),
	array( 14, 8, 1, 1),
	array( 15, 8, 1, 1),
	array( 16, 8, 1, 1),
	array( 17, 8, 1, 1),
	array( 18, 8, 2, 2),

	array(  0, 9, 1, 1),
	array(  1, 9, 1, 1),
	array(  2, 9, 2, 1),
	array(  4, 9, 2, 1),
	array( 14, 9, 1, 1),
	array( 15, 9, 1, 1),
	array( 16, 9, 2, 1)
);
