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

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'FANCYBOX_TITLE' => 'Fancybox',
	'FANCYBOX_TITLE_EXPLAIN' => 'Einstellungen für den Bildbetrachter Fancybox. Beachte dass die Fancybox 3 der GPLv3 Lizenz für "open source use" unterliegt. Für die kommerzielle Nutzung wird eine "Fancybox Kommerziell Lizenz" benötigt. Die Fancybox 4 muss für jegliche Nutzung Lizenziert werden. (https://fancyapps.com/fancybox/)',
	
	'FANCYBOX_VERSION' => 'Fancybox Version',
	'FANCYBOX_VERSION_DESC' => 'Fancybox Version auswählen.',
	'FANCYBOX_VERSION_NONE' => 'Keine Fancybox Version verfügbar.',
	'FANCYBOX_VERSION_V3' => 'Version 3',
	'FANCYBOX_VERSION_V4' => 'Version 4',
	
	'FANCYBOX_SETTINGS_TOOLBAR' => 'Anzeige Toolbar-Button',
	
	'FANCYBOX_TOOLBAR_BUTTON_ZOOM' => 'Zoom In/Out',
	'FANCYBOX_TOOLBAR_BUTTON_ZOOM_DESC' => 'Anzeige des Bildes in der Orginalgrösse.',
	'FANCYBOX_TOOLBAR_BUTTON_SHARE' => 'Bild Teilen',
	'FANCYBOX_TOOLBAR_BUTTON_SHARE_DESC' => 'Das Angezeigte Bild kann auf Facebook, Twitter oder Pinterest geteilt werden.',
	'FANCYBOX_TOOLBAR_BUTTON_SLIDESHOW' => 'Diashow starten',
	'FANCYBOX_TOOLBAR_BUTTON_SLIDESHOW_DESC' => 'Automatischen Bildwechsel nach Sekunden.',
	'FANCYBOX_TOOLBAR_BUTTON_FULLSCREEN' => 'Umschaltung Vollbild',
	'FANCYBOX_TOOLBAR_BUTTON_FULLSCREEN_DESC' => 'Es kann in den Vollbildmodus gewechselt werden.',
	'FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD' => 'Bild Herunterladen',
	'FANCYBOX_TOOLBAR_BUTTON_DOWNLOAD_DESC' => 'Zum Herunterladen des angezeigten Bildes.',
	'FANCYBOX_TOOLBAR_BUTTON_THUMBS' => 'Vorschaubilder anzeigen',
	'FANCYBOX_TOOLBAR_BUTTON_THUMBS_DESC' => 'Am Bildschirmrand kann eine Bildergalerie mit Vorschaubildern angezeugt werden.',
	
	'FANCYBOX_SETTINGS_EFFECT' => 'Einstellungen Effekte',
	'FANCYBOX_TRANSITIONEFFECT' => 'Übergangseffekt',
	'FANCYBOX_TRANSITIONEFFECT_DESC' => 'Auswahl des Übergangseffekt beim Bildwechsel.',
	'FANCYBOX_TRANSITIONEFFECT_FALSE' => 'Keiner',
	'FANCYBOX_TRANSITIONEFFECT_FADE' => 'Einblenden',
	'FANCYBOX_TRANSITIONEFFECT_SLIDE' => 'Verschieben',
	'FANCYBOX_TRANSITIONEFFECT_CIRCULAR' => 'Kreisel',
	'FANCYBOX_TRANSITIONEFFECT_TUBE'  => 'Röhre',
	'FANCYBOX_TRANSITIONEFFECT_ZOOM-IN-OUT'=> 'Rein- Rauszoomen',
	'FANCYBOX_TRANSITIONEFFECT_ROTATE' => 'Rotieren',
));
