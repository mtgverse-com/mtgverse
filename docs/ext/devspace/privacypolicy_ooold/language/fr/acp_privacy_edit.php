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
	'COOKIE_EDIT_EXPLAIN'				=> 'Personnaliser la « Politique des cookies » du forum.',
	'COOKIE_EDIT_EXPLAIN_NEW'			=> 'Créer et personnaliser la « Politique des cookies » pour la langue : %1$s.<br />La « Politique des cookies » est affichée lorsqu’elle est activée et qu’un utilisateur clique sur le lien « Politiques » situé dans la barre de navigation du pied de page.',

	'POLICY_DESCRIPTION'				=> 'Nom du fichier de la politique',
	'POLICY_DESCRIPTION_EXPLAIN'		=> 'Permet d’afficher le nom du fichier de cette politique devant être traduit en : <strong>%1$s</strong>.',
	'POLICY_EDIT'						=> 'Éditeur de fichiers des politiques',
	'POLICY_EDIT_EXPLAIN'				=> 'Depuis cette page il est possible de sélectionner les fichiers textes des différentes politiques que l’on souhaite personnaliser ou de créer un nouveau fichier texte d’une politique pour une langue en particulier.',
	'POLICY_FILE_OPTIONS'	   			=> 'Options du fichier de la politique',
	'POLICY_SELECT_FILE'		   		=> 'Sélectionner un fichier d’une politique',
	'POLICY_SELECT_LANGUAGE'			=> 'Sélectionner une langue',
	'PRIVACY_ACCEPT_EDIT_EXPLAIN'		=> 'Personnaliser la « Politique d’acceptation de la vie privée » du forum.',
	'PRIVACY_ACCEPT_EDIT_EXPLAIN_NEW'	=> 'Créer et personnaliser la « Politique d’acceptation de la vie privée » pour la langue : <strong>%1$s</strong>.<br />La « Politique d’acceptation de la vie privée » est affichée à la suite de la « Politique de vie privée ».',
	'PRIVACY_EDIT_CREATED'				=> 'Nouvelle « Politique de vie privée » créée »» %1$s',
	'PRIVACY_EDIT_EXPLAIN'				=> 'Personnaliser la « Politique de vie privée » du forum.',
	'PRIVACY_EDIT_EXPLAIN_NEW'			=> 'Créer et personnaliser la « Politique de vie privée » pour la langue : %1$s.<br />La « Politique de vie privée » est la principale politique décrivant les règles de confidentialités de ce forum.',
	'PRIVACY_EDIT_UPDATED'				=> '« Politique de vie privée » mise à jour »» %1$s',

	'TERM_OF_USE_EDIT_EXPLAIN'			=> 'Personnaliser les « Conditions d’utilisation ».',
	'TERM_OF_USE_EDIT_EXPLAIN_NEW'		=> 'Créer et personnaliser les « Conditions d’utilisation » pour la langue : %1$s.<br />les « Conditions d’utilisation » lorsqu’un nouvel utilisateur s’enregistrera sur le forum.',

	'SITENAME'							=> 'Nom du forum',
	'SITENAME_HELP'						=> 'Permet d’insérer l’espace réservé au nom du forum (%sitename%).',

	'VERSION'				   			=> 'Version',
));
