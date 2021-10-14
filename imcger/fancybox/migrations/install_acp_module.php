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

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['imcger_fancybox_toolbar']);
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v314');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('imcger_fancybox_version', 0)),
			array('config.add', array('imcger_fancybox_toolbar_button_zoom', 1)),
			array('config.add', array('imcger_fancybox_toolbar_button_share', 0)),
			array('config.add', array('imcger_fancybox_toolbar_button_slshow', 0)),
			array('config.add', array('imcger_fancybox_toolbar_button_fullscr', 1)),
			array('config.add', array('imcger_fancybox_toolbar_button_download', 0)),
			array('config.add', array('imcger_fancybox_toolbar_button_thumbs', 0)),
			array('config.add', array('imcger_fancybox_transitionEffect', 'slide')),

			array('module.add', array(
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_FANCYBOX_TITLE'
			)),
			array('module.add', array(
				'acp',
				'ACP_FANCYBOX_TITLE',
				array(
					'module_basename'	=> '\imcger\fancybox\acp\main_module',
					'modes'				=> array('settings'),
				),
			)),
		);
	}
}
