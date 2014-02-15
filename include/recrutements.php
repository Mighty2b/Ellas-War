<?php

include('include/menu_monalliance.php');

if(sizeof($liste_attente) > 0) {
	echo '﻿<h1>'._('Membres en attente').'</h1><br/>';

	echo '<div id="affichage_erreur"></div>';

	echo'<table class="centrer_tableau">';
	foreach($liste_attente as $do) {
		echo '
		<tr id="cadre_recrutement_'.$do->id.'">
		<td>&nbsp;&nbsp;
		<a href="'._('profilsjoueur').'-'.$do->id.'" 
		   class="centre_armee"><b>'.ucfirst($do->login).'</b></a>&nbsp;
		';
		if($paquet->get_infoj('droits_alliance')->accepter_joueur > 0) {
			echo '<a onclick="javascript:recruter('.$do->id.', \'oui\');"
			         class="cursor">'.img('images/joueurs/adept_reinstall.png', _('Accepter')).'</a>
		&nbsp;
		<a onclick="javascript:recruter('.$do->id.', \'non\');"
		   class="cursor">'.img('images/joueurs/agt_uninstall-product.png', _('Refuser')).'</a>';
		}
		echo '</td>
		<td rowspan="2" align="left">&nbsp;'.stripslashes($do->motivations).'&nbsp;</td>
		</tr>
		<tr id="cadre_recrutement2_'.$do->id.'">
		<td>&nbsp; '._('Niveau').' : '.$do->lvl.'<br/>
				&nbsp; '._('Victoires').' : '.$do->victoires.'<br/>
				&nbsp; '._('Défaites').' : '.$do->defaites.'&nbsp;
		</td></tr>';
			}
		echo '</table>';
}
else {
	echo '<div class="erreur">';
	echo display_error(103);
	echo '</div>';
}

if($paquet->get_infoj('droits_alliance')->recrutement > 0) {
	if(empty($info->statu_rec)) {
		echo '<br/><br/>
		<div id="fermer_recrutement"
		     class="cursor erreur ligne centrer" 
		     onclick="javascript:changer_recrutement();">
	'._('Fermer le recrutement').'
		</div>';
	}
	else {
		echo '<br/><br/>
		<div id="fermer_recrutement"
		     class="cursor erreur ligne centrer"
		     onclick="javascript:changer_recrutement();">
		'._('Ouvrir le recrutement').'
		</div>';
	}
}

	echo '
<script type="text/javascript">

function changer_recrutement() {
   $.ajax({
     type: "GET",
     url: "form/changer_recrutement.php"/*,
     data: "jeu="+id*/,
     success: function(msg){ $("#fermer_recrutement").html(msg);}
   });
}

function recruter(id, action) {
	$("#cadre_recrutement_"+id).hide("slow");
	$("#cadre_recrutement2_"+id).hide("slow");
   $.ajax({
     type: "GET",
     url: "form/recrutement.php",
     data: "joueur="+id+"&action="+action,
     success: function(msg){ $("#affichage_erreur").html(msg);}
   });
}

</script>';
?>