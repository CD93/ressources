<?php
/**
 * Gestion du formulaire de d'abonnement
 *
 * @plugin     abonnements
 * @copyright  2013
 * @author     damien simsen damien
 * @licence    GNU/GPL
 * @package    SPIP\Abonmt\Formulaires
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
//include_spip('inc/editer');

function formulaires_push_theme_charger_dist(){
	$valeurs['ajouter'] = '';
	$valeurs['id_auteur'] = '';
	return $valeurs;
}

function formulaires_push_theme_verifier_dist(){
}

function formulaires_push_theme_traiter_dist(){
	$ajouter = _request('ajouter');
	$id_auteur = _request('id_auteur');
	if ($ajouter=='oui') {
		$id = sql_updateq('spip_auteurs', array('messagerie' => 'oui'), 'id_auteur=' . intval($id_auteur));
	   	//$res['message_ok']= 'abonnement ajout&eacute; ! '.$id_auteur;
	}
	else if ($ajouter=='non'){
		$id = sql_updateq('spip_auteurs', array('messagerie' => 'non'), 'id_auteur=' . intval($id_auteur));	
		//$res['message_ok']= 'abonnement supprimé ! '.$id_auteur;
	}
}
?>