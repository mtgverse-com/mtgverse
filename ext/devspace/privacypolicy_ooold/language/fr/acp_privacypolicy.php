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
	'ALL'									=> 'Toutes les pages',

	'CLICK_TO_SELECT'						=> 'Cliquer sur le champs de saisie de la couleur pour sélectionner une couleur',

	'COOKIE_BLOCK_LINKS'					=> 'Bloquer tous les liens',
	'COOKIE_BLOCK_LINKS_EXPLAIN'			=> 'Permet d’empêcher les utilisateurs d’accéder à n’importe quelle page du forum avant d’avoir accepté la « Politique des cookies ».',
	'COOKIE_BOX_BDR_COLOUR'					=> 'Couleur du bord de la fenêtre d’acceptation des cookies',
	'COOKIE_BOX_BDR_COLOUR_EXPLAIN'			=> 'Permet de sélectionner la couleur du bord de la fenêtre d’acception des cookies.<br />Couleur par défaut : « <strong>#FFFF8A</strong> »',
	'COOKIE_BOX_BDR_WIDTH'					=> 'Largeur du bord de la fenêtre d’acceptation des cookies',
	'COOKIE_BOX_BDR_WIDTH_EXPLAIN'			=> 'Permet de saisir la largeur du bord de la fenêtre d’acception des cookies.<br />Largeur par défaut : « <strong>1</strong> »',
	'COOKIE_BOX_BG_COLOUR'					=> 'Couleur de l’arrière-plan de la fenêtre d’acceptation des cookies',
	'COOKIE_BOX_BG_COLOUR_EXPLAIN'			=> 'Permet de sélectionner la couleur d’arrière-plan de la fenêtre d’acception des cookies.<br />Couleur par défaut : « <strong>#00608F</strong> »',
	'COOKIE_BOX_HREF_COLOUR'				=> 'Couleur du lien de la fenêtre d’acceptation des cookies',
	'COOKIE_BOX_HREF_COLOUR_EXPLAIN'		=> 'Permet de sélectionner la couleur du lien de la fenêtre d’acception des cookies.<br />Couleur par défaut : « <strong>#FFFFFF</strong> »',
	'COOKIE_BOX_TXT_COLOUR'					=> 'Couleur du texte de la fenêtre d’acceptation des cookies',
	'COOKIE_BOX_TXT_COLOUR_EXPLAIN'			=> 'Permet de sélectionner la couleur du texte de la fenêtre d’acception des cookies.<br />Couleur par défaut : « <strong>#DBDB00</strong> »',

	'COOKIE_CUSTOM_PAGE'					=> 'Utiliser des couleurs personnalisées pour la page des politiques',
	'COOKIE_CUSTOM_PAGE_CORNERS'			=> 'Utilisez des coins arrondis',
	'COOKIE_CUSTOM_PAGE_CORNERS_EXPLAIN'	=> 'Permet d’afficher les coins arrondis pour la page des politiques.<br />Définir sur « <strong>Non</strong> » pour afficher des coins carrés sur la page.',
	'COOKIE_CUSTOM_PAGE_EXPLAIN'			=> 'Permet d’afficher des couleurs personnalisées pour la page des politiques.<br />Définir sur « <strong>Non</strong> » pour afficher les couleurs par défaut du style.',
	'COOKIE_CUSTOM_PAGE_RADIUS'				=> 'Arrondis personnalisés de la page',
	'COOKIE_CUSTOM_PAGE_RADIUS_EXPLAIN'		=> 'Permet de saisir la valeur de l’arrondi personnalisé en pixels des coins de la page des politiques. Définir sur « <strong>0</strong> » afin que la page ait des coins carrés.<br /><em>La valeur par défaut sur le style « prosilver » est de 7 pixels.</em>',

	'COOKIE_EXPIRE'							=> 'Expiration des cookies',
	'COOKIE_EXPIRE_EXPLAIN'					=> 'Si vous définissez ce paramètre sur Oui, l‘utilisateur devra accepter à nouveau la politique en matière de cookies chaque année.',

	'COOKIE_PAGE_BG_COLOUR'					=> 'Couleur de l’arrière-plan de la page des politiques',
	'COOKIE_PAGE_BG_COLOUR_EXPLAIN'			=> 'Sélectionnez la couleur d‘arrière-plan de la page des politiques.',
	'COOKIE_PAGE_TXT_COLOUR'				=> 'Permet de choisir la couleur d’arrière-plan pour la page des politiques',
	'COOKIE_PAGE_TXT_COLOUR_EXPLAIN'		=> 'Permet de choisir la couleur du texte pour la page des politiques.',

	'COOKIE_POLICY_ENABLE'					=> 'Activer la « Politique des cookies »',
	'COOKIE_POLICY_ENABLE_EXPLAIN'			=> 'Permet d’activer/désactiver sur le forum la fenêtre d’acceptation des cookies aux utilisateurs concernés par la directive EU Cookie (2012).',
	'COOKIE_POLICY_EXPLAIN'					=> 'Permet de définir les options des « Politique des cookies » & « Politique de vie privée ».',
	'COOKIE_POLICY_ON_INDEX'				=> 'Afficher uniquement sur l‘index du forum',
	'COOKIE_POLICY_ON_INDEX_EXPLAIN'		=> 'Afficher uniquement sur la page de l’index du forum.',
	'COOKIE_POLICY_OPTIONS'					=> 'Options de la « Politique des cookies »',

	'COOKIE_REQUIRE'						=> 'Acceptation requise des cookies',
	'COOKIE_REQUIRE_EXPLAIN'				=> 'Permet d’obliger l’acceptation des cookies du forum avant qu’un membre ne puisse s’enregistrer et se connecter sur le forum.<br />Néanmoins, paramétrée sur : « Oui » cette option permettra à l’utilisateur de consulter le forum (sous réserve des permissions nécessaires).',

	'COOKIE_SHOW_POLICY'					=> 'Afficher les « Politique des cookies » & « Politique de vie privée »',
	'COOKIE_SHOW_POLICY_EXPLAIN'			=> 'Permet d’afficher le lien vers la page des politiques dans la barre de navigation du pied de page du forum lorsque la fenêtre d’acceptation des cookies est désactivée, permettant ainsi de consulter les politiques du forum sans avoir à afficher la fenêtre d’acceptation des cookies.',

	'CUSTOM_BOX_OPTIONS'					=> 'Option d’affichage de la fenêtre d’acceptation des cookies',
	'CUSTOM_BOX_OPTIONS_EXPLAIN'			=> '<<strong>Permet de définir les options d’affichage de la fenêtre d’acceptation des cookies selon votre style.</strong>',
	'COOKIE_BOX_TOP'						=> 'Emplacement de la fenêtre d’acceptation des cookies',
	'COOKIE_BOX_TOP_EXPLAIN'				=> 'Permet de définir l’emplacement de la fenêtre d’acceptation des cookies, plus particulièrement la distance depuis le haut de la page.<br /><strong>Note 1 :</strong> si la fenêtre est inférieure à la valeur définie ici celle-ci apparaitra en pied de page.<br /><strong>Note 2 :</strong> définir sur la valeur « <strong>0</strong> » positionnera la fenêtre en haut de page.<br /><strong>Note 3 :</strong> définir sur la valeur « <strong>9999</strong> » positionnera la fenêtre en pied de page.',
	'CUSTOM_PAGE_COLOURS'					=> 'Couleurs de la page des politiques',
	'CUSTOM_PAGE_COLOURS_EXPLAIN'			=> '<strong>Permet de modifier les couleurs et les bords de la page des politiques selon votre style.</strong>',

	'PIXELS'								=> 'px',
	'POLICIES'								=> 'Politiques',
	'PRIVACY_POLICY_ANONYMISE'				=> 'Anonymiser les adresses IP',
	'PRIVACY_POLICY_ANONYMISE_EXPLAIN'		=> 'Anonymiser les adresses IP des membres utilisées pour publier des messages, sondages et messages privés.<br /><em>L’adresse IP réelle de l’utilisateur sera toujours utilisée dans les zones du forum où elle est nécessaire à la bonne gestion du forum.</em>',
	'PRIVACY_POLICY_ANONYMISE_IP'			=> 'Adresse IP pour l’anonymisation',
	'PRIVACY_POLICY_ANONYMISE_IP_EXPLAIN'	=> 'Permet de saisir l‘adresse&nbsp;IP à utiliser pour l‘anonymisation.<br><strong>Cela doit être une adresse IP valide</strong>',
	'PRIVACY_POLICY_ENABLE'					=> 'Activer la « Politique de vie privée »',
	'PRIVACY_POLICY_ENABLE_EXPLAIN'			=> 'Permet d’activer/désactiver sur le forum l’acceptation de la « Politique de vie privée » concernant le Règlement général sur la protection des données (RGPD 2018).',
	'PRIVACY_POLICY_FORCE'					=> 'Forcer l’acceptation de la « Politique de vie privée »',
	'PRIVACY_POLICY_FORCE_EXPLAIN'			=> 'Permet d’obliger tous les utilisateurs de ce forum à accepter « Politique de vie privée » concernant le RGPD.',
	'PRIVACY_POLICY_HIDE_CORE'				=> 'Masquer les liens de confidentialité de phpBB',
	'PRIVACY_POLICY_HIDE_CORE_EXPLAIN'		=> 'Permet de masquer l’affichage des liens prédéfinis par phpBB : « Confidentialité | Conditions ».<br /><strong>Note :</strong> cela ne concerne que les versions de phpBB 3.2.3 ou supérieures.',
	'PRIVACY_POLICY_LIST_LINES'				=> 'Nombre de lignes dans la liste de la « Politique de vie privée »',
	'PRIVACY_POLICY_LIST_LINES_EXPLAIN'		=> 'Permet de saisir le nombre de lignes à afficher dans la <em>liste des membres ayant acceptés ou non la « Politique de vie privée »</em>.',
	'PRIVACY_POLICY_OPTIONS'				=> 'Options de la « Politique de vie privée »',
	'PRIVACY_POLICY_REMOVE'					=> 'Afficher le lien de contact pour la suppression du compte',
	'PRIVACY_POLICY_REMOVE_EXPLAIN'			=> 'Permet d’afficher un lien de type « mailto », pour contacter l’administrateur du forum, sur la page « Données personnelles » accessible depuis le « Panneau de l’utilisateur ».',
	'PRIVACY_POLICY_RESET'					=> 'Réinitialiser les acceptations de la « Politique de vie privée »',
	'PRIVACY_POLICY_RESET_EXPLAIN'			=> 'Permet de réinitialiser les acceptations de la « Politique de vie privée », ainsi les membres devront l’accepter à nouveau.<br />Une fois cette action effectuée, il est recommandé de définir l’option « <strong>Forcer l’acceptation de la « Politique de vie privée »</strong> » sur « <strong>Oui</strong> ».',
));
