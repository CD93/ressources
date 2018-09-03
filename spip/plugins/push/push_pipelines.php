<?php
/**
 * Utilisations de pipelines par abonnements
 *
 * @plugin     alertes
 * @copyright  2013
 * @author     damien simsen damien
 * @licence    GNU/GPL
 * @package    SPIP\Abonmt\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

function push_taches_generales_cron($taches){
	$taches['push_maintenance'] = 84600; // tous les jours
	return $taches;
}
?>