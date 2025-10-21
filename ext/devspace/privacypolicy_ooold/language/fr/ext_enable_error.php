<?php
/**
*
* @package Privacy Policy Extension
* @copyright (c) 2016 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

/// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, [
	'EXT_ENABLE_ERROR' 		=> 'Cette extension nécessite phpBB 3.3.0 (ou supérieur).',
	'COOKIE_POLICY_FOUND'	=> 'Vous ne pouvez pas installer cette extension tant que l‘extension "Politique de cookies" est toujours installée.<br>Veuillez désactiver et supprimer les données de l‘extension "Politique relative aux cookies", puis réessayer.',
]);

/**
* Translators ignore this.
*
* Overwrite core error message keys with a more specific message.
*/
global $ver_error, $cookie_error;

if ($ver_error)
{
	$lang = array_merge($lang, array(
		'EXTENSION_NOT_ENABLEABLE' 		=> isset($lang['EXTENSION_NOT_ENABLEABLE']) ? $lang['EXTENSION_NOT_ENABLEABLE'] . '<br><br><strong>' . $lang['EXT_ENABLE_ERROR'] . '</strong>' : null,
		'CLI_EXTENSION_ENABLE_FAILURE' 	=> isset($lang['CLI_EXTENSION_ENABLE_FAILURE']) ? $lang['CLI_EXTENSION_ENABLE_FAILURE'] . ' : ' . $lang['EXT_ENABLE_ERROR'] : null,
	));
}

if ($cookie_error)
{
	$lang = array_merge($lang, array(
		'EXTENSION_NOT_ENABLEABLE' 		=> isset($lang['EXTENSION_NOT_ENABLEABLE']) ? $lang['EXTENSION_NOT_ENABLEABLE'] . '<br><br><strong>' . $lang['COOKIE_POLICY_FOUND'] . '</strong>' : null,
		'CLI_EXTENSION_ENABLE_FAILURE' 	=> isset($lang['CLI_EXTENSION_ENABLE_FAILURE']) ? $lang['CLI_EXTENSION_ENABLE_FAILURE'] . ' - ' . $lang['COOKIE_POLICY_FOUND'] : null,
	));
}
