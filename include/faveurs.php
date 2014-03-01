<?php

echo '<div class="ligne centrer">
	<h1>'._('Tout pour prendre de l\'avance !').'</h1>
	</div>';

echo '
<div id="menu_hf">
<div class="nb_faveur"><b>';
	if($paquet->get_infoj('faveur') > 1) {
		echo _('Faveurs');
	}
	else {
		echo _('Faveur');
	}
	
	echo ' :</b> <font color="red">'.$paquet->get_infoj('faveur').'</font>
	      </div>
<a href="'._('faveurs').'" 
   class="bouton_hf"><span class="bouton_hf_int">Spéciaux</span></a>
<br>
<a href="'._('faveurs').'-1" 
   class="bouton_hf"><span class="bouton_hf_int">Combat</span></a>
<br>
<a href="'._('faveurs').'-2" 
   class="bouton_hf"><span class="bouton_hf_int">Commerce</span></a>
<br>
<a href="'._('faveurs').'-3" 
   class="bouton_hf"><span class="bouton_hf_int">Ressources</span></a>
<br>
<a href="'._('faveurs').'-99" 
   class="bouton_hf"><span class="bouton_hf_int">Archives</span></a>
<br>
</div>
<div id="liste_hf" class="centrer">';

if(empty($_GET['var1'])) {
	$_GET['var1'] = 0;
}

switch($_GET['var1']) {
	case 0:
	
	break;
	
	case 1:
	
	break;
	
	case 2:
	
	break;
	
	case 3:
	
	break;
	
	default:
	
	$liste = $paquet->get_answer('dernieres_faveurs')->{1};
	
	if(sizeof($liste) > 0) {
		echo '<br/><b>'._('Dernières actions').'</b><br/>';
		foreach($liste as $do) {
			echo '<br/><b>'._('Faveur').' : ';
			switch($do->type) {
				case 'drachme':
				case 'drachmes': echo _('drachmes');
				break;
				
				case 'attaques': echo _('attaques');
				break;
				
				case 'spartiate': echo _('spartiates');
				break;
				
				case 'espion': echo _('espions');
				break;
				
				case 'bois': echo _('bois');
				break;
				
				case 'fer': echo _('fer');
				break;
				
				case 'eau': echo _('eau');
				break;
				
				case 'argent': echo _('argent');
				break;
				
				case 'nourriture': echo _('nourriture');
				break;
				
				case 'banque':
				case 'tresor': echo _('aucune taxe sur le trésor');
				break;
				
        case 'zeus': echo _('Appuis de Zeus'); break;
        case 'hermes': echo _('Appui d\'Hermès'); break;
        case 'deimos': echo _('Appui de Déimos'); break;
        case 'eros': echo _('Appui d\'Éros'); break;
        case 'midas': echo _('Appui de Midas'); break;
        case 'ploutos': echo _('Appui de Ploutos'); break;
        case 'hebe': echo _('Appui d\'Hébé'); break;
        case 'leonnidas': echo _('Appui de Léonnidas'); break;
        
				default:echo $do->type;
				break;
			}
			echo '</b>, '.display_date($do->timestamp,4);
		}
	}
	else {
		echo _('Vous n\'avez utilisé aucune faveur');
	}
	
	break;
}

echo '</div>';

?>
