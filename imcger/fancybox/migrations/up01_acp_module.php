<?php
/**
*
* Implements the image viewer Fancybox in phpBB. 
* An extension for the phpBB Forum Software package.
*
* @copyright (c) 2021, Thorsten Ahlers
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace imcger\fancybox\migrations;

class up01_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['imcger_fancybox_image_borderwidth']);
	}

	static public function depends_on()
	{
		return array('\imcger\fancybox\migrations\install_acp_module');
	}

	public function update_data()
	{		
		return array(
			array('config.add', array('imcger_fancybox_image_borderwidth', 0)),
			array('config.add', array('imcger_fancybox_image_bordercolor', 'ffffff')),
		);
	}
}
