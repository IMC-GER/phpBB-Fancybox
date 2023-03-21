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

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\extension\manager */
	protected $ext_manager;

	/** @var bool is_ext_links */
	protected $is_ext_links;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config				$config			Config object
	 * @param \phpbb\template\template			$template		Template object
	 * @param \phpbb\user						$user			User object
	 * @param \phpbb\language\language			$language		language object
	 * @param \phpbb\db\driver\driver_interface	$db				Driver interface object
	 * @param \phpbb\extension\manager			$ext_manager	Extension manager object
	 */
	public function __construct
	(
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\user $user,
		\phpbb\language\language $language,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->config		= $config;
		$this->template 	= $template;
		$this->user 		= $user;
		$this->language 	= $language;
		$this->db			= $db;
		$this->ext_manager	= $ext_manager;

		/* Check if extension "imcger/externallinks" aktive */
		$this->is_ext_links =  $this->ext_manager->is_enabled('imcger/externallinks');
	}

	public static function getSubscribedEvents()
	{
		return array(
			'core.page_header'								=> 'show_fancybox_var',
			'core.parse_attachments_modify_template_data'	=> 'modify_template_data',
			'core.text_formatter_s9e_configure_after'		=> 'configure_textformatter',
		);
	}

	public function modify_template_data($event)
	{
		$block_array = $event['block_array'];

		if (isset($block_array['S_THUMBNAIL']) && $block_array['S_THUMBNAIL'])
		{
			$block_array += [
				'S_THUMBNAIL_IMCGER' => true,
			];

			unset($block_array['S_THUMBNAIL']);
		}

		if (isset($block_array['S_IMAGE']) && $block_array['S_IMAGE'])
		{
			$block_array += [
				'S_IMAGE_IMCGER' => true,
			];

			unset($block_array['S_IMAGE']);
		}

		if (isset($block_array['S_FILE']) && $block_array['S_FILE'])
		{
			$file_arr = explode('.', $block_array['DOWNLOAD_NAME']);
			$file_ext = strtolower($file_arr[count($file_arr)-1]);

			$sql = 'SELECT extension FROM ' . EXTENSIONS_TABLE . ' WHERE group_id = (SELECT group_id FROM ' . EXTENSION_GROUPS_TABLE . ' WHERE group_name = "IMAGES")';
			$result = $this->db->sql_query($sql);

			while ($row = $this->db->sql_fetchrow($result))
			{
				if ($file_ext == $row['extension'])
				{
					$block_array += [
						'S_FILE_IMCGER' => true
					];
					unset($block_array['S_FILE']);
					break;
				}
			}
			$this->db->sql_freeresult();
		}

		$event['block_array'] = $block_array;
	}

	public function configure_textformatter($event)
	{
		/* if "imcger/externallinks" aktive, do nothing */
		if ($this->is_ext_links)
		{
			return;
		}

		$link_img_template = '';
		$link_url_template = '';

		/** @var \s9e\TextFormatter\Configurator $configurator */
		$configurator = $event['configurator'];

		/* The default URL tag template is this:
		   <a href="{@url}" class="postlink"><xsl:apply-templates/></a> */
		$default_url_template = $configurator->tags['URL']->template;

		/* The default IMG tag template is this:
		   <img src="{@src}" class="postimage" alt="{$L_IMAGE}"/> */
		$default_img_template = $configurator->tags['IMG']->template;

		/* Add Fancybox attribute to the default IMG template */
		$link_img_template = $default_img_template;
		$pos = 0;

		while ($pos = strpos($link_img_template, '<img src="{@src}"', $pos))
		{
			$link_img_template =  substr($link_img_template, 0, $pos) .
								  '<a href="{@src}" class="fancybox" data-fancybox="image" data-caption="{@src}">' .
								  substr($link_img_template, $pos);

			$pos = strpos($link_img_template, '/>', $pos);

			$link_img_template =  substr($link_img_template, 0, $pos+2) .
								  '</a>' .
								  substr($link_img_template, $pos+2);
		}

		/* Add Fancybox attribute to the URL template when link is an image */
		$link_url_template = str_replace(
			'href="{@url}"',
			'href="{@url}"  data-fancybox="image" data-caption="{@url}" ',
			$default_url_template
		);
		$link_url_template = str_replace(
			'class="',
			'class="fancybox ',
			$link_url_template
		);
		$link_url_template = '<xsl:choose>' .
								/* Check if it an image */
								'<xsl:when test="contains(@url, \'.jpg\') or contains(@url, \'.jpeg\') or contains(@url, \'.gif\') or contains(@url, \'.png\') or contains(@url, \'.webp\') or contains(@url, \'.svg\') or ' .
												'contains(@url, \'.JPG\') or contains(@url, \'.JPEG\') or contains(@url, \'.GIF\') or contains(@url, \'.PNG\') or contains(@url, \'.WEBP\') or contains(@url, \'.SVG\')">' .
									$link_url_template .
								'</xsl:when>' .
								/* Link standard display */
								'<xsl:otherwise>' .
									$default_url_template .
								'</xsl:otherwise>' .
							'</xsl:choose>';

		$configurator->tags['IMG']->template = $link_img_template;
		$configurator->tags['URL']->template = $link_url_template;

	}

	public function show_fancybox_var()
	{
		/* Add Fancybox language file */
		$this->language->add_lang('fancybox_lang','imcger/fancybox');

		$imcger_fancybox_version			= $this->config['imcger_fancybox_version'];
		$imcger_fancybox_image_borderwidth	= $this->config['imcger_fancybox_image_borderwidth'];
		$imcger_fancybox_image_bordercolor	= $this->config['imcger_fancybox_image_bordercolor'];
		$imcger_fancybox_transitionEffect	= $this->config['imcger_fancybox_transitionEffect'];
		$imcger_fancybox_language			= substr($this->language->lang('USER_LANG'), 0, 2);
		$imcger_fancybox_toolbar_middle		= '';

		if ($imcger_fancybox_version < 5)
		{
			// When Fancybox 3 or 4
			$imcger_fancybox_toolbar  = $this->config['imcger_fancybox_toolbar_button_zoom'] ? '"zoom",' : '';
			$imcger_fancybox_toolbar .= ($this->config['imcger_fancybox_toolbar_button_share'] && ($imcger_fancybox_version == 3)) ? '"share",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_slshow'] ? '"slideShow",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_fullscr'] ? '"fullScreen",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_download'] ? '"download",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_thumbs'] ? '"thumbs",' : '';

			// When Fancybox 4
			if ($imcger_fancybox_version > 3)
			{
				$imcger_fancybox_toolbar = strtolower($imcger_fancybox_toolbar);
			}
			$imcger_fancybox_thumbs  = (bool) $this->config['imcger_fancybox_toolbar_button_thumbs'] ? 'true' : 'false';
		}
		else
		{
			// When Fancybox 5
			$imcger_fancybox_toolbar_middle  = $this->config['imcger_fancybox_toolbar_button_zoom'] && $this->config['imcger_fancybox_toolbar_button_rotate'] ? '"zoomIn","zoomOut","toggle1to1",' : '';
			$imcger_fancybox_toolbar_middle .= $this->config['imcger_fancybox_toolbar_button_rotate'] ? '"rotateCCW","rotateCW",' : '';

			$imcger_fancybox_toolbar  = $this->config['imcger_fancybox_toolbar_button_zoom'] && !$this->config['imcger_fancybox_toolbar_button_rotate'] ? '"zoomIn","zoomOut",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_slshow'] ? '"slideshow",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_fullscr'] ? '"fullscreen",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_download'] ? '"download",' : '';
			$imcger_fancybox_toolbar .= $this->config['imcger_fancybox_toolbar_button_thumbs'] ? '"thumbs",' : '';
			$imcger_fancybox_thumbs   = (bool) $this->config['imcger_fancybox_toolbar_button_thumbs'] ? 'classic' : 'false';

		}

		$this->template->assign_vars([
			'S_IMCGER_FANCYBOX_VERSION'			=> $imcger_fancybox_version,
			'IMCGER_FANCYBOX_IMAGE_BORDERWIDTH'	=> $imcger_fancybox_image_borderwidth,
			'IMCGER_FANCYBOX_IMAGE_BORDERCOLOR'	=> $imcger_fancybox_image_bordercolor,
			'IMCGER_FANCYBOX_TOOLBAR_MIDDLE'	=> $imcger_fancybox_toolbar_middle,
			'IMCGER_FANCYBOX_TOOLBAR'			=> $imcger_fancybox_toolbar,
			'IMCGER_FANCYBOX_THUMBS'			=> $imcger_fancybox_thumbs,
			'IMCGER_FANCYBOX_TRANSITIONEFFECT'	=> $imcger_fancybox_transitionEffect,
			'IMCGER_FANCYBOX_LANGUAGE'			=> $imcger_fancybox_language,
		]);
	}
}
