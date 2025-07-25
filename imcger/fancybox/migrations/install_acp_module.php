<?php
/**
 * Implements the image viewer Fancybox in phpBB.
 * An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2022, Thorsten Ahlers
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace imcger\fancybox\migrations;

class install_acp_module extends \phpbb\db\migration\migration
{
	public function effectively_installed(): bool
	{
		return isset($this->config['imcger_fancybox_version']);
	}

	public static function depends_on(): array
	{
		return ['\phpbb\db\migration\data\v31x\v314'];
	}

	public function update_data(): array
	{
		/*
			Prüfen welche Fancybox Version installiert ist.
		*/
		$path = '../ext/imcger/fancybox/styles/all/template/fancybox/';
		$fancybox_v3_css = $path . 'jquery.fancybox.min.css';
		$fancybox_v3_js  = $path . 'jquery.fancybox.min.js';
		$fancybox_v4_css = $path . 'fancybox.css';
		$fancybox_v4_js  = $path . 'fancybox.umd.js';
		$is_fancybox = 0;

		if (file_exists($fancybox_v3_css) && file_exists($fancybox_v3_js))
		{
			$is_fancybox = 3;
		}
		else if (file_exists($fancybox_v4_css) && file_exists($fancybox_v4_js))
		{
			$is_fancybox = 4;
		}

		return [
			['config.add', ['imcger_fancybox_version', $is_fancybox]],
			['config.add', ['imcger_fancybox_toolbar_button_zoom', 1]],
			['config.add', ['imcger_fancybox_toolbar_button_share', 0]],
			['config.add', ['imcger_fancybox_toolbar_button_slshow', 0]],
			['config.add', ['imcger_fancybox_toolbar_button_fullscr', 1]],
			['config.add', ['imcger_fancybox_toolbar_button_download', 0]],
			['config.add', ['imcger_fancybox_toolbar_button_thumbs', 0]],
			['config.add', ['imcger_fancybox_transitionEffect', 'slide']],

			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_FANCYBOX_TITLE'
			]],
			['module.add', [
				'acp',
				'ACP_FANCYBOX_TITLE',
				[
					'module_basename'	=> '\imcger\fancybox\acp\main_module',
					'modes'				=> ['settings'],
				],
			]],
		];
	}
}
