<?php
/**
 * Gestion du formulaire de d'édition d'un contact
 *
 * @plugin Contacts & Organisations pour Spip 3.0
 * @license GPL (c) 2009 - 2013
 * @author Cyril Marion, Matthieu Marcillaud, Rastapopoulos
 *
 * @package SPIP\Contacts\Formulaires
**/

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/editer');


/**
 * Chargement du formulaire d'édition d'un contact
 *
 * @param int|string $id_contact
 *     Identifiant du contact. 'new' pour un nouveau contact.
 * @param int $id_organisation
 *     Identifiant de l'organisation parente, ou 0.
 * @param string $redirect
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel 'objet|x' indiquant de lier le contact à cet objet,
 *     tel que 'article|3'
 * @return array
 *     Environnement du formulaire
**/
function formulaires_editer_compte_charger_dist($id_auteur) {
	$valeurs = array('nom' => '','prenom' => '','struc' =>'', 'email' => '','type' =>'');	
	return $valeurs;
}


/**
 * Vérification du formulaire d'édition d'un contact
 *
 * @param int|string $id_contact
 *     Identifiant du contact. 'new' pour un nouveau contact.
 * @param int $id_organisation
 *     Identifiant de l'organisation parente, ou 0.
 * @param string $redirect
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel 'objet|x' indiquant de lier le contact à cet objet,
 *     tel que 'article|3'
 * @return array
 *     Tableau des éventuelles erreurs
**/
function formulaires_editer_compte_verifier_dist($id_auteur) {
	
	return $erreurs;
}

/**
 * Traitements du formulaire d'édition d'un contact
 *
 * Crée l'enregistrement et l'association éventuelle avec un objet
 * indiqué
 *
 * @param int|string $id_contact
 *     Identifiant du contact. 'new' pour un nouveau contact.
 * @param int $id_organisation
 *     Identifiant de l'organisation parente, ou 0.
 * @param string $redirect
 *     URL de redirection après le traitement
 * @param string $associer_objet
 *     Éventuel 'objet|x' indiquant de lier le contact à cet objet,
 *     tel que 'article|3'
 * @return array
 *     Retour des traitements
**/
function formulaires_editer_compte_traiter_dist($id_auteur) {
	$nom = _request('nom');
	$email = _request('email');
	$prenom = _request('prenom');
	$struc = _request('struc');
	$type = _request('type');
	sql_updateq('spip_auteurs', array('email' => $email), 'id_auteur=' . intval($id_auteur));
	sql_updateq('spip_contacts', array('nom' => $nom,'prenom' => $prenom), 'id_contact=' . intval($id_auteur));
	sql_updateq('spip_organisations', array('nom' => $struc), 'id_organisation=' . intval($id_auteur));
	sql_updateq('spip_mots_liens', array('id_mot' => $type), 'id_objet=' . intval($id_auteur).' AND objet="auteur"');
	$res['message_ok'] = $email.$type;
	return $res;
}
