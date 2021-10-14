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
 
namespace imcger\fancybox\acp;

/**
 * Fancybox ACP module.
 */
class main_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main($id, $mode)
	{
		global $config, $request, $template, $user;

		$user->add_lang_ext('imcger/fancybox', 'common');
		$this->tpl_name = 'acp_fancybox_body';
		$this->page_title = $user->lang('ACP_FANCYBOX_TITLE');
		add_form_key('imcger/fancybox');

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key('imcger/fancybox'))
			{
				trigger_error('FORM_INVALID', E_USER_WARNING);
			}
			
			$config->set('imcger_fancybox_version', $request->variable('imcger_fancybox_version', 0));
			$config->set('imcger_fancybox_transitionEffect', $request->variable('imcger_fancybox_transitionEffect', 'slide'));
			$config->set('imcger_fancybox_toolbar_button_zoom', $request->variable('imcger_fancybox_toolbar_button_zoom', 1));
			$config->set('imcger_fancybox_toolbar_button_share', $request->variable('imcger_fancybox_toolbar_button_share', 0));
			$config->set('imcger_fancybox_toolbar_button_slshow', $request->variable('imcger_fancybox_toolbar_button_slshow', 1));
			$config->set('imcger_fancybox_toolbar_button_fullscr', $request->variable('imcger_fancybox_toolbar_button_fullscr', 1));
			$config->set('imcger_fancybox_toolbar_button_download', $request->variable('imcger_fancybox_toolbar_button_download', 0));
			$config->set('imcger_fancybox_toolbar_button_thumbs', $request->variable('imcger_fancybox_toolbar_button_thumbs', 0));
			
			trigger_error($user->lang('ACP_FANCYBOX_SETTING_SAVED') . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'U_ACTION'									=> $this->u_action,

			'IMCGER_FANCYBOX_VERSION'					=> (int) $config['imcger_fancybox_version'],
			'IMCGER_FANCYBOX_TRANSITIONEFFECT'			=> $config['imcger_fancybox_transitionEffect'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_ZOOM'		=> $config['imcger_fancybox_toolbar_button_zoom'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_SHARE'		=> $config['imcger_fancybox_toolbar_button_share'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_SLSHOW'		=> $config['imcger_fancybox_toolbar_button_slshow'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_FULLSCR'	=> $config['imcger_fancybox_toolbar_button_fullscr'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD'	=> $config['imcger_fancybox_toolbar_button_download'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_THUMBS'		=> $config['imcger_fancybox_toolbar_button_thumbs'],
		));
	}
}
