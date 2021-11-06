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

namespace imcger\fancybox\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Fancybox listener
 */
class main_listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;
	
	/** @var \phpbb\language\language */
	protected $language;


	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, \phpbb\language\language $language)
	{
		$this->config   = $config;
		$this->template = $template;
		$this->user 	= $user;
		$this->language = $language;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'		=>	'show_fancybox_var',
		);
	}

	public function show_fancybox_var()
	{  
		// Add Fancybox language file
		$this->language->add_lang('fancybox_lang','imcger/fancybox');

		$imcger_fancybox_version			= $this->config['imcger_fancybox_version'];
		$imcger_fancybox_image_borderwidth	= $this->config['imcger_fancybox_image_borderwidth'];
		$imcger_fancybox_image_bordercolor	= $this->config['imcger_fancybox_image_bordercolor'];
		$imcger_fancybox_toolbar			= $this->config['imcger_fancybox_toolbar_button_zoom'] ? '"zoom",' : '';
		$imcger_fancybox_toolbar		   .= ($this->config['imcger_fancybox_toolbar_button_share'] && ($imcger_fancybox_version == 3)) ? '"share",' : '';
		$imcger_fancybox_toolbar		   .= $this->config['imcger_fancybox_toolbar_button_slshow'] ? '"slideShow",' : '';
		$imcger_fancybox_toolbar		   .= $this->config['imcger_fancybox_toolbar_button_fullscr'] ? '"fullScreen",' : '';
		$imcger_fancybox_toolbar		   .= $this->config['imcger_fancybox_toolbar_button_download'] ? '"download",' : '';
		$imcger_fancybox_toolbar		   .= $this->config['imcger_fancybox_toolbar_button_thumbs'] ? '"thumbs",' : '';
		$imcger_fancybox_transitionEffect	= $this->config['imcger_fancybox_transitionEffect'];
		$imcger_fancybox_language			= substr($this->user->lang['USER_LANG'], 0, 2);
		
		// When Fancybox 4
		if($imcger_fancybox_version > 3)
		{
			$imcger_fancybox_toolbar = strtolower($imcger_fancybox_toolbar);
			$imcger_fancybox_thumbs  = (bool)$this->config['imcger_fancybox_toolbar_button_thumbs'] ? 'true' : 'false';
		}

		$this->template->assign_vars([
			'S_IMCGER_FANCYBOX_VERSION'			=> $imcger_fancybox_version,
			'IMCGER_FANCYBOX_IMAGE_BORDERWIDTH'	=> $imcger_fancybox_image_borderwidth,
			'IMCGER_FANCYBOX_IMAGE_BORDERCOLOR'	=> $imcger_fancybox_image_bordercolor,
			'IMCGER_FANCYBOX_TOOLBAR'			=> $imcger_fancybox_toolbar,
			'IMCGER_FANCYBOX_THUMBS'			=> $imcger_fancybox_thumbs,
			'IMCGER_FANCYBOX_TRANSITIONEFFECT'	=> $imcger_fancybox_transitionEffect,
			'IMCGER_FANCYBOX_LANGUAGE'			=> $imcger_fancybox_language,
		]);
	}
}
