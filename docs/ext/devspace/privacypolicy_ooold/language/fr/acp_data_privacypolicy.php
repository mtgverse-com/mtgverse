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
	'ACCEPT_ME'						=> 'Accepter la « Politique de vie privée » pour ce membre',
	'ACCEPT_REMOVE'					=> 'Retirer l’acceptation de la « Politique de vie privée » pour ce membre',
	'ACP_PRIVACY_POLICY_EXPLAIN'	=> 'Depuis cette page il est possible de sélectionner un utilisateur et de consulter ses données personnelles.',
	'ACP_PRIVACY_TITLE'				=> 'Données de la « Politique de vie privée »',

	'DETAILS_FOR'					=> 'Données personnelles de : %1$s',

	'INVALID_USERNAME'				=> 'Nom d’utilisateur saisi incorrect',

	'NO_IPS_FOUND'					=> 'Aucune adresse IP trouvée',
	'NO_USERNAME'					=> 'Aucun nom d’utilisateur saisi',

	'POLICY_ACCEPTANCE_SET'			=> 'La « Politique de vie privée » pour le membre : « %1$s » a été acceptée avec succès !',
	'POLICY_ACCEPTANCE_UNSET'		=> 'La « Politique de vie privée » pour le membre : « %1$s » a été retirée avec succès !',

	'SELECT_USERNAME_EXPLAIN'		=> 'Permet de saisir le nom d’utilisateur d’un membre pour consulter ses données personnelles.',
	'SELECT_USERNAME'				=> 'Sélectionner un nom d’utilisateur',
));
