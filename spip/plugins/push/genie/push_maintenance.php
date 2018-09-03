<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2012                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Envoi du Mail des abonnements
 * base sur le squelette abonnements.html
 *
 */
function genie_push_maintenance_dist($t) {
	//$datetime = date("H");
	//if ($datetime<13) return -1;
	//include_spip('lib/PHPMailer-master/class.phpmailer');
	$sel = sql_select('id_auteur,email','spip_auteurs',"messagerie='oui'");
	while ($row = sql_fetch($sel)) {
		push_mailto($row['id_auteur'],$row['email']);
	}
	return 1;
}
function push_mailto($id_auteur,$email) {
	include_spip('classes/facteur');
	include_spip('inc/filtres');
			$msg = recuperer_fond(
				"modeles/alertes",
				array(
					'id_auteur' => $id_auteur
				)
			);
			if(!$msg){
				return	;
			}
			$corps = array(
				'html' => $msg,
				'exceptions' => true,
			);
			$titre="Nouvelles ressources du CRP";
			$envoyer_mail = charger_fonction('envoyer_mail', 'inc');
			try {
				$retour = $envoyer_mail($email, $titre, $corps);
			} catch (Exception $e) {
				return $e->getMessage();
			}
}


?>
