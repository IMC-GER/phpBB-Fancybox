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
	'FANCYBOX_CLOSE'			 => 'Schließen',
	'FANCYBOX_NEXT'				 => 'Weiter',
	'FANCYBOX_PREV'				 => 'Zurück',
	'FANCYBOX_MODAL'			 => 'Sie können diesen modalen Inhalt mit der ESC-Taste schließen',
	'FANCYBOX_ERROR'			 => 'Etwas ist schief gelaufen, bitte versuchen Sie es später noch einmal',
	'FANCYBOX_IMAGE_ERROR'		 => 'Bild nicht gefunden',
	'FANCYBOX_TOGGLE_ZOOM'		 => 'Zoom In/Out',
	'FANCYBOX_TOGGLE_THUMBS'	 => 'Miniaturansichten Ein/Aus',
	'FANCYBOX_TOGGLE_SLIDESHOW'	 => 'Diashow Start/Stop',
	'FANCYBOX_TOGGLE_FULLSCREEN' => 'Vollbildmodus Ein/Aus',
	'FANCYBOX_DOWNLOAD'			 => 'Herunterladen',
	'FANCYBOX_SHARE'			 => 'Bild teilen',
	'FANCYBOX_ROTATECCW'		 => 'Gegen den Uhrzeigersinn drehen',
	'FANCYBOX_ROTATECW'			 => 'Im Uhrzeigersinn drehen',
	'FANCYBOX_ITERATEZOOM'		 => 'Zoomstufe umschalten',
	'FANCYBOX_TOGGLE1TO1'		 => 'Zoomstufe umschalten',
	'FANCYBOX_TOGGLEFS'			 => 'Vollbild umschalten',
	'FANCYBOX_ZOOMIN'			 => 'Vergrößern',
	'FANCYBOX_ZOOMOUT'			 => 'Verkleinern',
]);
