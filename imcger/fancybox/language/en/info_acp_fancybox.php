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
	'ACP_FANCYBOX_TITLE'		 => 'Lightbox Fancybox',
	'ACP_FANCYBOX_SETTINGS'		 => 'Settings',
	'ACP_FANCYBOX_SETTING_SAVED' => 'Fancybox settings saved successfully.',

	'IMCGER_REQUIRE_PHPBB' => 'This extension requires a phpBB version greater or equal than %1$s and less than %2$s. Your version is %3$s.',
	'IMCGER_REQUIRE_PHP'   => 'This extension requires a php version greater or equal than %1$s and less than %2$s. Your version is %3$s.',
]);
