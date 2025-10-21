<?php
/**
 *
 * @package Move Disapproved Posts
 * @copyright (c) 2020 david63
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
	$lang = [];
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

$lang = array_merge($lang, [
	'CLICK_DONATE' 				=> 'Cliquez ici pour faire un don',

	'DONATE'					=> 'Don',
	'DONATE_EXTENSIONS'			=> 'Faire un don pour mes extensions',
	'DONATE_EXTENSIONS_EXPLAIN'	=> 'Cette extension, comme toutes mes extensions, est totalement gratuite. Si vous en avez profité, pensez à faire un don en cliquant sur le bouton de don PayPal ci-contre - je l‘apprécierais. Je promets qu‘il n‘y aura pas de spam ni de demandes de dons supplémentaires, bien qu‘ils soient toujours les bienvenus.',

	'NEW_VERSION'				=> 'Nouvelle Version - %s',
	'NEW_VERSION_EXPLAIN'		=> 'La version %1$s de cette extension est maintenant disponible au téléchargement.<br>%2$s',
	'NEW_VERSION_LINK'			=> 'Télécharger ici',
	'NO_JS' 					=> 'Javascript semble être désactivé.<br>Merci <a href="https://enablejavascript.co/">d‘activer</a> Javascript dans votre navigateur pour pouvoir profiter de toutes les fonctionnalités de cette page.',
	'NO_VERSION_EXPLAIN'		=> 'Les informations de mise à jour de version ne sont pas disponibles.',

	'PAYPAL_BUTTON'				=> 'Faire un don avec le bouton PayPal',
	'PAYPAL_TITLE'				=> 'PayPal - Le moyen le plus sûr et le plus simple de payer en ligne !',
	'PHP_NOT_VALID' 			=> 'Votre version de PHP n‘est pas compatible avec cette extension.',
	'PHPBB_NOT_VALID' 			=> 'Votre version de phpBB n‘est pas compatible avec cette extension.',

	'SAVE'						=> 'Sauvegarder',
	'SAVE_CHANGES'				=> 'Sauvegarder les modifications',

	'VERSION' 					=> 'Version',
]);
