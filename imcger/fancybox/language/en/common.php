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
	$lang = [];
}

$lang = array_merge($lang, [
	// Language pack author
	'ACP_IMCGER_LANG_DESC'	  => 'British English',
	'ACP_IMCGER_LANG_EXT_VER' => '1.3.1',
	'ACP_IMCGER_LANG_AUTHOR'  => 'IMC-Ger',

	// Discription
	'FANCYBOX_TITLE'				=> 'Fancybox',
	'FANCYBOX_TITLE_EXPLAIN'		=> 'Settings for the Fancybox image viewer. Note that Fancybox 3 is subject to the GPLv3 license for "open source use". For commercial use, a "Fancybox Commercial License" is required. Fancybox 4 must be licensed for any use. (https://fancyapps.com/fancybox/)',

	// Set version
	'FANCYBOX_VERSION'				=> 'Fancybox Version',
	'FANCYBOX_VERSION_DESC'			=> 'Select Fancybox Version.',
	'FANCYBOX_VERSION_NONE'			=> 'None Fancybox version available.',
	'FANCYBOX_VERSION'				=> 'Version',

	// Style settings
	'FANCYBOX_SETTINGS_STYLE'		=> 'Settings Style',
	'FANCYBOX_IMAGES_STYLE'			=> 'Picture frame',
	'FANCYBOX_IMAGES_STYLE_DESC'	=> 'The width of the picture frame is specified in "px". If 0 is entered, no frame is displayed.<br>The color for the picture frame is specified as a 6-digit hex value.',

	// Settings
	'FANCYBOX_SETTINGS'				=> 'Settings',
	'FANCYBOX_SHOW_WITH_LINK'		=> 'Integrate links',
	'FANCYBOX_SHOW_WITH_LINK_DESC'	=> 'If this option is enabled, the images inserted as links will be displayed in the fancybox.',

	// Toolbar settings
	'FANCYBOX_SETTINGS_TOOLBAR'					=> 'Buttons appear in the top right corner.',
	'FANCYBOX_TOOLBAR_BUTTON_ZOOM'				=> 'Zoom in/out',
	'FANCYBOX_TOOLBAR_BUTTON_ZOOM_DESC'			=> 'To resize the displayed image.',
	'FANCYBOX_TOOLBAR_BUTTON_ROTATE'			=> 'Rotate',
	'FANCYBOX_TOOLBAR_BUTTON_ROTATE_DESC'		=> 'Rotate the image clockwise or anticlockwise.',
	'FANCYBOX_TOOLBAR_BUTTON_SHARE'				=> 'Share',
	'FANCYBOX_TOOLBAR_BUTTON_SHARE_DESC'		=> 'The displayed image can be shared on Facebook, Twitter or Pinterest.',
	'FANCYBOX_TOOLBAR_BUTTON_SLIDESHOW'			=> 'Start slideshow',
	'FANCYBOX_TOOLBAR_BUTTON_SLIDESHOW_DESC'	=> 'Starts the automatic picture change every seconds.',
	'FANCYBOX_TOOLBAR_BUTTON_FULLSCREEN'		=> 'Full screen',
	'FANCYBOX_TOOLBAR_BUTTON_FULLSCREEN_DESC'	=> 'Switch to full screen mode.',
	'FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD'			=> 'Download',
	'FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD_DESC'		=> 'Download the displayed image.',
	'FANCYBOX_TOOLBAR_BUTTON_THUMBS'			=> 'Thumbnails',
	'FANCYBOX_TOOLBAR_BUTTON_THUMBS_DESC'		=> 'A picture gallery with thumbnails can be created at the edge of the screen.',

	// Transitional effects
	'FANCYBOX_SETTINGS_EFFECT'					=> 'Settings effect',
	'FANCYBOX_TRANSITIONEFFECT'					=> 'Transition effect',
	'FANCYBOX_TRANSITIONEFFECT_DESC'			=> 'Transition effect between slides.',
	'FANCYBOX_TRANSITIONEFFECT_FALSE'			=> 'False',
	'FANCYBOX_TRANSITIONEFFECT_FADE'			=> 'Fade',
	'FANCYBOX_TRANSITIONEFFECT_SLIDE'			=> 'Slide',
	'FANCYBOX_TRANSITIONEFFECT_CIRCULAR'		=> 'Circular',
	'FANCYBOX_TRANSITIONEFFECT_TUBE'			=> 'Tube',
	'FANCYBOX_TRANSITIONEFFECT_ZOOM-IN-OUT'		=> 'Zoom-in-out',
	'FANCYBOX_TRANSITIONEFFECT_ROTATE'			=> 'Rotate',
	'FANCYBOX_TRANSITIONEFFECT_CROSSFADE'		=> 'Crossfade',
	'FANCYBOX_TRANSITIONEFFECT_CLASSIC'			=> 'Classic',
	'FANCYBOX_TRANSITIONEFFECT_STRING'			=> 'String',
]);
