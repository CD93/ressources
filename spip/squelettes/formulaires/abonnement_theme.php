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

function formulaires_abonnement_theme_charger_dist($id_mot){
	$valeurs['id_mot'] = $id_mot;
	$valeurs['ajouter'] = '';
	$valeurs['id_auteur'] = '';
	return $valeurs;
}

function formulaires_abonnement_theme_verifier_dist($id_mot){
}

function formulaires_abonnement_theme_traiter_dist($id_mot){
	$ajouter = _request('ajouter');
	$id_auteur = _request('id_auteur');
	if ($ajouter=='oui') {
			$abo = array(
				'id_mot' => $id_mot,
				'id_objet' => $id_auteur,
				'objet' => 'auteur'
			);
	$id = sql_insertq('spip_mots_liens', $abo);
	//$res['message_ok']= 'abonnement ajout&eacute; ! '.$ajouter;
	return $res;
	}
	else if ($ajouter=='non'){
		$abo = array(
			'id_mot='. $id_mot,
			'id_objet='. $id_auteur,
			"objet='auteur'"
		);
		$del = sql_delete('spip_mots_liens',$abo);
		//$res['message_ok'] = 'abonnement supprim&eacute'.$ajouter;	
		return $res;
	}
}
?>