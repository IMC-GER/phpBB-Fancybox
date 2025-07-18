<?php
/**
 * Implements the image viewer Fancybox in phpBB.
 * An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2022, Thorsten Ahlers
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace imcger\fancybox\acp;

/**
 * Fancybox ACP module info.
 */
class main_info
{
	public function module(): array
	{
		return [
			'filename'	=> '\imcger\fancybox\acp\main_module',
			'title'		=> 'ACP_FANCYBOX_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'ACP_FANCYBOX_SETTINGS',
					'auth'	=> 'ext_imcger/fancybox && acl_a_board',
					'cat'	=> ['ACP_FANCYBOX_TITLE'],
				],
			],
		];
	}
}
