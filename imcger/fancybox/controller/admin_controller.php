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

namespace imcger\fancybox\controller;

class admin_controller
{
	/** @var config */
	protected $config;

	/** @var template */
	protected $template;

	/** @var language */
	protected $language;

	/** @var request */
	protected $request;

	/** @var \phpbb\extension\manager */
	protected $ext_manager;

	/** @var string Custom form action */
	protected $u_action;

	/**
	 * Constructor
	 *
	 * @param config	$config
	 * @param template	$template
	 * @param language	$language
	 * @param request	$request
	 * @param \phpbb\extension\manager	$ext_manager
	 *
	 */
	public function __construct(
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\language\language $language,
		\phpbb\request\request $request,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->config		= $config;
		$this->template		= $template;
		$this->language		= $language;
		$this->request		= $request;
		$this->ext_manager	= $ext_manager;
	}

	/**
	 * Display the options a user can configure for this extension
	 *
	 * @return null
	 * @access public
	 */
	public function display_options()
	{
		// Add ACP lang file
		$this->language->add_lang('common', 'imcger/fancybox');

		add_form_key('imcger/fancybox');

		// Is the form being submitted to us?
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('imcger/fancybox'))
			{
				trigger_error($this->language->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}

			// Store the variable to the db
			$this->set_variable();

			trigger_error($this->language->lang('ACP_FANCYBOX_SETTING_SAVED') . adm_back_link($this->u_action));
		}

		/*
			Prüfen welche Fancybox Version installiert ist.
		*/
		$path = '../ext/imcger/fancybox/styles/all/template/fancybox/';
		$fancybox_v3_css	 = $path . 'jquery.fancybox.min.css';
		$fancybox_v3_js		 = $path . 'jquery.fancybox.min.js';
		$fancybox_v4plus_css = $path . 'fancybox.css';
		$fancybox_v4plus_js  = $path . 'fancybox.umd.js';
		$is_fancybox3 = false;
		$is_fancybox4 = false;
		$is_fancybox5 = false;

		if (file_exists($fancybox_v3_css) && file_exists($fancybox_v3_js))
		{
			$buffer = file_get_contents($fancybox_v3_js);

			if (preg_match('@version\:\"(\d\.\d+\.\d+)\"@m', $buffer, $match))
			{
				$is_fancybox3 = intval($match[1]) == 3 ? $match[1] : false;
			}
		}

		if (file_exists($fancybox_v4plus_css) && file_exists($fancybox_v4plus_js))
		{
			$buffer = file_get_contents($fancybox_v4plus_js);

			if (preg_match('@version\=\"(\d\.\d+\.\d+)\"@m', $buffer, $match))
			{
				$is_fancybox4 = intval($match[1]) == 4 ? $match[1] : false;
			}

			if (preg_match('@value\:\"(\d\.\d+\.\d+)\"@', $buffer, $match))
			{
				$is_fancybox5 = intval($match[1]) == 5 ? $match[1] : false;
			}
		}

		$metadata_manager = $this->ext_manager->create_extension_metadata_manager('imcger/fancybox');

		$this->template->assign_vars([
			'U_ACTION'									=> $this->u_action,
			'EXT_LINK_TITLE'							=> $metadata_manager->get_metadata('display-name'),
			'EXT_LINK_EXT_VER'							=> $metadata_manager->get_metadata('version'),
			'IMCGER_FANCYBOX_IS_VERSION_3'				=> $is_fancybox3,
			'IMCGER_FANCYBOX_IS_VERSION_4'				=> $is_fancybox4,
			'IMCGER_FANCYBOX_IS_VERSION_5'				=> $is_fancybox5,
			'IMCGER_FANCYBOX_VERSION'					=> $this->config['imcger_fancybox_version'],
			'IMCGER_FANCYBOX_TRANSITIONEFFECT'			=> $this->config['imcger_fancybox_transitionEffect'],
			'IMCGER_FANCYBOX_IMAGES_BORDERWIDTH'		=> $this->config['imcger_fancybox_image_borderwidth'],
			'IMCGER_FANCYBOX_IMAGES_BORDERCOLOR'		=> $this->config['imcger_fancybox_image_bordercolor'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_ZOOM'		=> $this->config['imcger_fancybox_toolbar_button_zoom'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_ROTATE'		=> $this->config['imcger_fancybox_toolbar_button_rotate'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_SHARE'		=> $this->config['imcger_fancybox_toolbar_button_share'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_SLSHOW'		=> $this->config['imcger_fancybox_toolbar_button_slshow'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_FULLSCR'	=> $this->config['imcger_fancybox_toolbar_button_fullscr'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD'	=> $this->config['imcger_fancybox_toolbar_button_download'],
			'IMCGER_FANCYBOX_TOOLBAR_BUTTON_THUMBS'		=> $this->config['imcger_fancybox_toolbar_button_thumbs'],
			'IMCGER_FANCYBOX_SHOW_WITH_LINK'			=> $this->config['imcger_fancybox_show_with_link'],
		]);
	}

	/**
	 * Store the variable to the db
	 *
	 * @return null
	 * @access protected
	 */
	protected function set_variable()
	{
		$this->config->set('imcger_fancybox_version', $this->request->variable('imcger_fancybox_version', 0));
		$this->config->set('imcger_fancybox_image_borderwidth', $this->request->variable('imcger_fancybox_image_borderwidth', 0));
		$this->config->set('imcger_fancybox_image_bordercolor', $this->request->variable('imcger_fancybox_image_bordercolor', 'ffffff'));
		$this->config->set('imcger_fancybox_transitionEffect', $this->request->variable('imcger_fancybox_transitionEffect', 'slide'));
		$this->config->set('imcger_fancybox_toolbar_button_zoom', $this->request->variable('imcger_fancybox_toolbar_button_zoom', 0));
		$this->config->set('imcger_fancybox_toolbar_button_rotate', $this->request->variable('imcger_fancybox_toolbar_button_rotate', 0));
		$this->config->set('imcger_fancybox_toolbar_button_share', $this->request->variable('imcger_fancybox_toolbar_button_share', 0));
		$this->config->set('imcger_fancybox_toolbar_button_slshow', $this->request->variable('imcger_fancybox_toolbar_button_slshow', 0));
		$this->config->set('imcger_fancybox_toolbar_button_fullscr', $this->request->variable('imcger_fancybox_toolbar_button_fullscr', 0));
		$this->config->set('imcger_fancybox_toolbar_button_download', $this->request->variable('imcger_fancybox_toolbar_button_download', 0));
		$this->config->set('imcger_fancybox_toolbar_button_thumbs', $this->request->variable('imcger_fancybox_toolbar_button_thumbs', 0));
		$this->config->set('imcger_fancybox_show_with_link', $this->request->variable('imcger_fancybox_show_with_link', 0));
	}

	/**
	 * Set page url
	 *
	 * @param string $u_action Custom form action
	 * @return null
	 * @access public
	 */
	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}
}
