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
   class="bouton_fv"><span class="bouton_fv_int">Packs</span></a>
<br>
<a href="'._('faveurs').'-1" 
   class="bouton_fv"><span class="bouton_fv_int">Armée</span></a>
<br>
<a href="'._('faveurs').'-2" 
   class="bouton_fv"><span class="bouton_fv_int">Commerce</span></a>
<br>
<a href="'._('faveurs').'-3" 
   class="bouton_fv"><span class="bouton_fv_int">Mythologie</span></a>
<br>
<a href="'._('faveurs').'-4" 
   class="bouton_fv"><span class="bouton_fv_int">Ressources</span></a>
<br>
<a href="'._('faveurs').'-99" 
   class="bouton_fv"><span class="bouton_fv_int">Archives</span></a>
<br>
</div>
<div id="liste_hf" class="centrer">';

if(empty($_GET['var1'])) {
	$_GET['var1'] = 0;
}

switch($_GET['var1']) {
	case 0:
	
echo '
<div class="ligne_50"
     style="height:140px;"><div class="cadre_renta centrer">
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-zeus"><b>'._('Appui de Zeus').'</b></a><br>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-zeus">'._('Appui de Déimos').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-zeus">'._('Appui d\'Éros').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-zeus">'._('Appui d\'Hébé').'</a>
    <br>
    <br>'._('Prix : 2 faveurs').'
  </div>
</div>';

	break;
	
	case 1:
	
echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos"><b>'._('Appui de Déimos').'</b></a><br>
    <br>
        <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos">'._('Remportez de nombreuses victoires !').'</a>
    <br>
        <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos">'._('15 attaques bonus vous sont ajoutées. Vous pouvez en faire un maximum de 5 par jour.').'</a>
    <br>
    <br>'._('Prix : 1 faveur').'
  </div>
 </div>';

echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos"><b>'._('Appui d\'Éros').'</b></a>
    <br><br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos">'._('Augmentez votre XP pendant une semaine !').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos">'._('- 20% de perte d\'XP lors d\'une défaite').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-deimos">'._('+ 20% d\'XP en cas de victoire').'</a>
    <br>
    <br>'._('Prix : 1 faveur').'
  </div>
</div>';

echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
  <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-leonnidas"><b>'._('Appui de Léonidas').'</b></a>
  <br>
  <br>
  <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-leonnidas">'._('+ 40 Spartiates').'</a>
  <br>
  <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-leonnidas">'._('+ 200 espions').'</a>
  <br>
  <br>'._('Prix : 1 faveur').'
  </div>
</div>';

	break;
	
	case 2:
	
echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-hermes"><b>'._('Appui d\'Hermès').'</b></a>
    <br>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-hermes">'._('+50% de lots sur le commerce').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-hermes">'._('-50% sur la taxe lors des rachats').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-hermes">'._('Licence de grand commerçant').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
       href="Faveurs-hermes">'._('Ventes/Achats anonymes sans frais').'</a>
    <br>
    <br>'._('Prix : 2 faveurs pour une semaine').'
  </div>
</div>';

	break;
	
	case 3:
	
	if($paquet->get_answer('possible_changer_temple')->{1} > 0) {
echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
    <a href="'._('modifiertemples').'"><b>'._('Changer de temple').'</b></a>
    <br><br>
    <a href="'._('modifiertemples').'">'._(
		'Vous pourrez changer l\'un de vos quatre temples.<br/>
		 Cette modification n\'est possible qu\'une fois tous les six mois.').'</a>
    <br>
    <br>'._('Prix : suivant le temple').'
  </div>
</div>';
	}
	
	break;
	
	case 4:

echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-hebe"><b>'._('Appui d\'Hébé').'</b></a>
    <br><br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-hebe">'._('Vous ne payerez pas de taxes lors de vos retraits dans votre trésor durant 7 jours').'</a>
    <br>
    <br>'._('Prix : 1 faveur').'
  </div>
</div>';

echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
   <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-midas"><b>'._('Appui de Midas').'</b></a>
   <br><br>
   <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-midas">'._('Augmentez vos richesses !').'</a>
   <br>
   <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-midas">'._('+ 800\'000 Drachmes').'</a>
   <br>
   <br>Prix : 1 faveur
  </div>
</div>';

echo '
<div class="ligne_50"
     style="height:140px;">
<div class="cadre_renta centrer">
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-ploutos"><b>'._('Appui de Ploutos').'</b></a>
    <br><br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-ploutos">'._('Ayez des ressources en abondance !').'</a>
    <br>
    <a onclick="if (window.confirm(\''._('Valider votre achat ?').'\')) { this.disabled=\'true\';} else { return false; }" 
      href="Faveurs-ploutos">'._('+ 2\'000\'000 Bois, Fer, Nourriture, Eau et 1\'000\'000 d\'Argent').'</a>
    <br>
    <br>'._('Prix : 1 faveur').'
  </div>
</div>';

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
