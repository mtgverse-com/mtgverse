<?php
/**
*
* @package phpBB Extension - Header Banner
* @copyright (c) 2015 HiFiKabin
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	'ACP_HEADERBANNER_CONFIG_EXPLAIN'				=> 'This is the Configuration page for the Header Banner Extension',
	'ACP_HEADERBANNER_CONFIG_SET'					=> 'Configuration',

	'HEADERBANNER_CONFIG'							=> 'Header Banner Settings',
	'HEADERBANNER_SAVED'							=> 'Header Banner settings saved',

	'HEADERBANNER'									=> 'Full Width Header Banner URL',
	'HEADERBANNER_EXPLAIN'							=> 'This Banner will show on Full Sized Devices.',
	'HEADERBANNER_RESPONSIVE'						=> 'Mobile Device Header Banner URL',
	'HEADERBANNER_RESPONSIVE_EXPLAIN'				=> 'This Banner will show on Hand Held Devices.',
	'HEADERBANNER_PLACEHOLDER'						=> 'http://mysite.com/images/banner.jpg',
	'HEADERBANNER_SELECT'							=> 'Do you wish to activate the Header Banner Extension?',

	'HEADERBANNER_DESTINATION'						=> 'Do you wish the Banner to point to an alternative destination',
	'HEADERBANNER_DESTINATION_NAME'					=> 'Name of the alternative site the banner points to',
	'HEADERBANNER_URL'								=> 'Alternative Destination',
	'HEADERBANNER_OPEN'								=> 'Do you want the link above to open in a new tab/window?',
	'HEADERBANNER_URL_EXPLAIN'						=> 'Enter the FULL url of the alternative destination upon clicking the banner',
	'HEADERBANNER_URL_PLACEHOLDER'					=> 'https://othersite.com',
	
	'HEADERBANNER_LOGO'								=> 'Do you wish to place Site Logo over the banner?',
	
	'HEADERBANNER_MOBILE'							=> 'Do you wish to have alternative banner for small screens?',

	'HEADERBANNER_CORNER'							=> 'Corner Radius',
	'HEADERBANNER_CORNER_EXPLAIN'					=> 'Do you want to radius the corner of the above image?',
	'HEADERBANNER_PX'								=> 'px',

	'HEADERBANNER_BACKGROUND'						=> 'Do you wish to hide the Header Background colour?',

	'HEADERBANNER_SIZE'								=> 'Full Size Banner width.',
	'HEADERBANNER_RESPONSIVE_SIZE'					=> 'Mobile Device Banner width.',
	'HEADERBANNER_SIZE_EXPLAIN'						=> 'Your banner will be displayed at the width of the forum header or the width of the banner (whichever is smaller) Should you wish to set a maximum width, you can do so here. Default 1500px.',
	'HEADERBANNER_RESPONSIVE_SIZE_EXPLAIN'			=> 'Your banner will be displayed at the width of the forum header or the width of the banner (whichever is smaller) Should you wish to set a maximum width, you can do so here. Default 700px.',
	'HEADERBANNER_REQUIRED'							=> 'Required',

	'HEADERBANNER_SEARCH'							=> 'Where would you like the search to be shown?',
	'HEADERBANNER_SEARCH_HEADER_TOP_LEFT'			=> 'Header top left',
	'HEADERBANNER_SEARCH_HEADER_TOP_RIGHT'			=> 'Header top right',
	'HEADERBANNER_SEARCH_HEADER_BOTTOM_LEFT'		=> 'Header bottom left',
	'HEADERBANNER_SEARCH_HEADER_BOTTOM_RIGHT'		=> 'Header bottom right',
	'HEADERBANNER_SEARCH_HEADER_BOTTOM_MIDDLE'		=> 'Header bottom centre',
	'HEADERBANNER_SEARCH_NAVBAR'					=> 'NavBar',
	'HEADERBANNER_SEARCH_REMOVE'					=> 'Nowhere',
));
