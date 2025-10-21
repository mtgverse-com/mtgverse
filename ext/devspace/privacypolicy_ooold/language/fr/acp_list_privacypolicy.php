<?php
/**
*
* @package Privacy Policy Extension
* @copyright (c) 2018 david63
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

$lang = array_merge($lang, array(
	'ACCEPT_DATE'			=> 'Date d‘acceptation',
	'ALL'					=> 'Tous',

	'CLEAR_FILTER'			=> 'Réinitialiser',

	'FILTER_BY'				=> 'Filtrer par',

	'GO'					=> 'Envoyer',

	'HASH'					=> '#',

	'LAST_VISIT'			=> 'Dernière visite',

	'NO_VISIT'				=> 'Membres n’ayant pas encore visité le forum',
	'NOT_ACCEPTED'			=> 'Membres n’ayant pas accepté',

	'OTHER'					=> 'Autre',

	'PAGE_NUMBER'			=> 'Page',
	'PRIVACY_LIST_EXPLAIN'	=> 'Permet de lister tous les membres du forum et d’afficher leur date d’acceptation de la « Politique de vie privée » de ce forum.',

	'REG_DATE'				=> 'Date d‘enregistrement',

	'SORT_BY'				=> 'Trier par',

	'TOTAL_USERS'			=> 'Total',

	'USER_ID'				=> 'ID utilisateur',
	'USERNAME'				=> 'Nom d‘utilisateur',

	'VERSION'				=> 'Version',

	// Translators - set these to whatever is most appropriate in your language
	// These are used to populate the filter keys
	'START_CHARACTER'	=> 'A',
	'END_CHARACTER'		=> 'Z',
));
