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
	'ACP_USER_UTILS'				=> 'Utilitaires utilisateur',
	'AUTOGROUPS_TYPE_PPACCPT'		=> 'Politique de confidentialité acceptée',

	'COOKIE_POLICY'					=> 'Politique de confidentialité et de cookies',

	'POLICY_RESET_LOG'				=> '<strong>Réinitialisation de l‘acceptation de la politique de confidentialité pour tous les utilisateurs</strong>',
	'POLICY_USER_ACCEPT_LOG'		=> '<strong>Acceptation de la politique de confidentialité définie pour l‘utilisateur</strong><br>»» %1$s',
	'POLICY_USER_UNSET_LOG'			=> '<strong>Acceptation de la politique de confidentialité non définie pour l‘utilisateur</strong><br>»» %1$s',
	'PRIVACY_DATA'					=> 'Données de confidentialité',
	'PRIVACY_LIST'					=> 'Liste des acceptations',
	'PRIVACY_POLICY'				=> 'Politique de confidentialité',
	'PRIVACY_POLICY_ADD_LOG'		=> '<strong>Politique de confidentialité ajoutée</strong><br>»» %1$s',
	'PRIVACY_POLICY_EDIT'			=> 'Éditeur de fichiers',
	'PRIVACY_POLICY_EDIT_LOG'		=> '<strong>Politique de confidentialité modifiée</strong><br>»» %1$s',
	'PRIVACY_POLICY_LOG'			=> '<strong>Paramètres de la politique de confidentialité mis à jour</strong>',
	'PRIVACY_POLICY_MANAGE'			=> 'Paramètres de la politique de confidentialité',

	'TAPATALK_INSTALLED'			=> 'Tapatalk détecté',
	'TAPATALK_INSTALLED_EXPLAIN'	=> 'L‘extension Tapatalk a été détectée comme étant installée sur ce forum, ce qui est incompatible avec l‘extension Politique de confidentialité.<br><br>Cela signifie que tout utilisateur Tapatalk accédant à ce forum ne sera pas soumis aux exigences de la politique de confidentialité.',
));
