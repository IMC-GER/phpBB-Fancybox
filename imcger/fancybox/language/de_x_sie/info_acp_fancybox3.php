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
	'ACP_FANCYBOX_TITLE' => 'Bildbetrachter Fancybox',
	'ACP_FANCYBOX_SETTINGS' => 'Einstellungen',
	'ACP_FANCYBOX_SETTING_SAVED' => 'Fancybox Einstellungen erfolgreich gespeichert.'
));
