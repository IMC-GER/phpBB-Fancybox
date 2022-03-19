<?php
/**
 *
 * Implements the image viewer Fancybox in phpBB.
 * An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2022, Thorsten Ahlers
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'FANCYBOX_CLOSE' => 'Close',
	'FANCYBOX_NEXT' => 'Next',
	'FANCYBOX_PREV' => 'Previous',
	'FANCYBOX_MODAL' => 'You can close this modal content with the ESC key',
	'FANCYBOX_ERROR' => 'Something Went Wrong, Please Try Again Later',
	'FANCYBOX_IMAGE_ERROR' => 'Image Not Found',
	'FANCYBOX_TOGGLE_ZOOM' => 'Toggle zoom level',
	'FANCYBOX_TOGGLE_THUMBS' => 'Toggle thumbnails',
	'FANCYBOX_TOGGLE_SLIDESHOW' => 'Toggle slideshow',
	'FANCYBOX_TOGGLE_FULLSCREEN' => 'Toggle full-screen mode',
	'FANCYBOX_DOWNLOAD' => 'Download',
	'FANCYBOX_SHARE' => 'Share Image',
));
