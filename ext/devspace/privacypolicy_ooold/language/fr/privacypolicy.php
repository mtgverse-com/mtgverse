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

// DEVELOPERS PLEASE NOTE
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
	'ACCEPT' 				=> 'J‘accepte cette politique',

	'COOKIE_ACCEPT_TEXT'	=> 'Ce forum utilise des cookies pour vous offrir l‘expérience la meilleure et la plus pertinente. Pour utiliser ce forum, cela signifie que vous devez accepter cette politique.<br>Vous pouvez en savoir plus sur les cookies utilisés sur ce forum en cliquant sur le lien "Politiques" en pied de page.<br>',
	'COOKIE_ACCEPT'			=> '[ J’accepte ]',
	'COOKIE_ACCESS'			=> 'Accès aux cookies',

	'COOKIE_BLOCK'			=> 'Il est nécessaire d’accepter la « Politique des cookies » pour accéder aux différentes pages de ce forum.',

	'COOKIE_POLICY'			=> 'Politique relative aux cookies',
	'COOKIE_PRIV_POLICY'	=> 'Politiques & cookies',

	'COOKIE_REQUIRE_ACCESS'	=> '<h3>Acceptation des cookies requise</h3>
	<p>Il est nécessaire d’accepter la politique de cookies de %1$s avant de pouvoir vous inscrire sur ce site ou, si vous êtes déjà inscrit, avant de pouvoir vous connecter au site.</p>',

	'DECLINE' 				=> 'Je n‘accepte pas cette politique',

	'HR_BBCODE_HELPLINE' 	=> 'Insérer une ligne horizontale',

	'POLICY_ACCEPT' 		=> 'Accepter la politique de confidentialité',
	'POLICY_EXPLAIN'		=> 'Afficher les politiques de confidentialité et de cookies de ce forum',
));
