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
	// Language pack author
	'ACP_IMCGER_LANG_DESC'	  => 'Deutsch (Du)',
	'ACP_IMCGER_LANG_EXT_VER' => '1.3.1',
	'ACP_IMCGER_LANG_AUTHOR'  => 'IMC-Ger',

	// Discription
	'FANCYBOX_TITLE'		 		=> 'Fancybox',
	'FANCYBOX_TITLE_EXPLAIN' 		=> 'Einstellungen für den Bildbetrachter Fancybox. Beachte dass die Fancybox 3 der GPLv3 Lizenz für "open source use" unterliegt. Für die kommerzielle Nutzung wird eine "Fancybox Kommerziell Lizenz" benötigt. Die Fancybox 4 und 5 muss für jegliche Nutzung lizenziert werden. (https://fancyapps.com/fancybox/)',

	// Set version
	'FANCYBOX_VERSION'				=> 'Fancybox Version',
	'FANCYBOX_VERSION_DESC'			=> 'Fancybox Version auswählen.',
	'FANCYBOX_VERSION_NONE'			=> 'Keine Fancybox Version verfügbar.',
	'FANCYBOX_VERSION'				=> 'Version',

	// Style settings
	'FANCYBOX_SETTINGS_STYLE'		=> 'Einstellungen Style',
	'FANCYBOX_IMAGES_STYLE'			=> 'Bilderrahmen',
	'FANCYBOX_IMAGES_STYLE_DESC'	=> 'Die Breite des Bilderrahmens wird in "px" angeben. Bei der Eingabe von 0 wird kein Rahmen angezeigt.<br>Die Angabe der Farbe für den Bilderrahmen wird als 6 stelligen Hex-Wert angegeben.',

	// Settings
	'FANCYBOX_SETTINGS'				=> 'Einstellungen',
	'FANCYBOX_SHOW_WITH_LINK'		=> 'Links einbinden',
	'FANCYBOX_SHOW_WITH_LINK_DESC'	=> 'Wenn diese Option aktive ist werden Bilder, die als Link eingefügt sind, in der Fancybox angezeigt.',

	// Toolbar settings
	'FANCYBOX_SETTINGS_TOOLBAR'					=> 'Anzeige Toolbar-Button',
	'FANCYBOX_TOOLBAR_BUTTON_ZOOM'				=> 'Zoom In/Out',
	'FANCYBOX_TOOLBAR_BUTTON_ZOOM_DESC'			=> 'Anzeige des Bildes vergrössern oder verkleiner.',
	'FANCYBOX_TOOLBAR_BUTTON_ROTATE'			=> 'Drehen',
	'FANCYBOX_TOOLBAR_BUTTON_ROTATE_DESC'		=> 'Des Bild im Uhrzeigersinn oder gegen den Uhrzeigersinn drehen.',
	'FANCYBOX_TOOLBAR_BUTTON_SHARE'				=> 'Bild Teilen',
	'FANCYBOX_TOOLBAR_BUTTON_SHARE_DESC'		=> 'Das Angezeigte Bild kann auf Facebook, Twitter oder Pinterest geteilt werden.',
	'FANCYBOX_TOOLBAR_BUTTON_SLIDESHOW'			=> 'Diashow starten',
	'FANCYBOX_TOOLBAR_BUTTON_SLIDESHOW_DESC'	=> 'Automatischen Bildwechsel nach Sekunden.',
	'FANCYBOX_TOOLBAR_BUTTON_FULLSCREEN'		=> 'Umschaltung Vollbild',
	'FANCYBOX_TOOLBAR_BUTTON_FULLSCREEN_DESC'	=> 'Es kann in den Vollbildmodus gewechselt werden.',
	'FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD'			=> 'Bild Herunterladen',
	'FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD_DESC'		=> 'Zum Herunterladen des angezeigten Bildes.',
	'FANCYBOX_TOOLBAR_BUTTON_THUMBS'			=> 'Vorschaubilder anzeigen',
	'FANCYBOX_TOOLBAR_BUTTON_THUMBS_DESC'		=> 'Am Bildschirmrand kann eine Bildergalerie mit Vorschaubildern angezeugt werden.',

	// Transitional effects
	'FANCYBOX_SETTINGS_EFFECT'					=> 'Einstellungen Effekte',
	'FANCYBOX_TRANSITIONEFFECT'					=> 'Übergangseffekt',
	'FANCYBOX_TRANSITIONEFFECT_DESC'			=> 'Auswahl des Übergangseffekt beim Bildwechsel.',
	'FANCYBOX_TRANSITIONEFFECT_FALSE'			=> 'Keiner',
	'FANCYBOX_TRANSITIONEFFECT_FADE'			=> 'Einblenden',
	'FANCYBOX_TRANSITIONEFFECT_SLIDE'			=> 'Verschieben',
	'FANCYBOX_TRANSITIONEFFECT_CIRCULAR'		=> 'Kreisel',
	'FANCYBOX_TRANSITIONEFFECT_TUBE'			=> 'Röhre',
	'FANCYBOX_TRANSITIONEFFECT_ZOOM-IN-OUT'		=> 'Rein- Rauszoomen',
	'FANCYBOX_TRANSITIONEFFECT_ROTATE'			=> 'Rotieren',
	'FANCYBOX_TRANSITIONEFFECT_CROSSFADE'		=> 'Überblenden',
	'FANCYBOX_TRANSITIONEFFECT_CLASSIC'			=> 'Klassisch',
	'FANCYBOX_TRANSITIONEFFECT_STRING'			=> 'Faden',
]);
