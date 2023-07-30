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

namespace imcger\fancybox\migrations;

class up03_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['imcger_fancybox_show_with_link']);
	}

	public static function depends_on()
	{
		return array('\imcger\fancybox\migrations\up02_acp_module');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('imcger_fancybox_show_with_link', 0)),
		);
	}
}
