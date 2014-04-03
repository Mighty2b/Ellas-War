<?php

$retour = $paquet->get_answer('get_mesattaques')->{1};

$mes_attaques_faites_normale=$retour[0];
$faite_restante_n=$retour[1];
$faite_restante_n2=$retour[2];
$temps_attaque_faite_n=$retour[3];
$mes_attaques_faites_guerre=$retour[4];
$faite_restante_g=$retour[5];
$faite_restante_g2=$retour[6];
$temps_attaque_faite_g=$retour[7];
$mes_attaques_faites_bonus=$retour[8];
$faite_restante_b=$retour[9];
$faite_restante_b2=$retour[10];
$temps_attaque_faite_b=$retour[11];
$mes_attaques_recus_normale=$retour[12];
$recue_restante_n=$retour[13];
$recue_restante_n2=$retour[14];
$temps_attaque_recu_n=$retour[15];
$mes_attaques_recus_guerre=$retour[16];
$recue_restante_g=$retour[17];
$recue_restante_g2=$retour[18];
$temps_attaque_recu_g=$retour[19];
$attaques_bonus_dispo=$retour[20];

echo '<div class="ligne centrer">
     <b>'._('Ce mois ci').' :</b> '.
     _('bilan de votre XP personnel').
     ' : <span class="rouge_goco">'.plus_valeur($paquet->get_infoj('points2')).'</span>, '.
		 _('bilan de l\'XP apportée à votre alliance').
     ' : <span class="rouge_goco">'.plus_valeur($paquet->get_infoj('points3')).'<span>
		 <br/><br/></div>';		 

echo '<h2 class="centrer">'._('Attaques disponibles').'</h2>
<table class=\'tableau80 centrer_tableau\'>
	<thead>
	<tr>
    <td class="titre_tab">&nbsp;&nbsp;</td>
    <td class="titre_tab">&nbsp;'._('Effectuées').'&nbsp;</td>
    <td class="titre_tab">&nbsp;'._('Disponibles').'&nbsp;</td>
    <td class="titre_tab">&nbsp;'._('Retour').'&nbsp;</td>
	</tr>
	</thead>
	<tfoot><tfoot>
	<tbody>
  
  <tr class="tableau_fond1">
      <td class="gauche">&nbsp;<b>'._('Hors guerre').'</b>&nbsp;</td>
      <td class="centrer">&nbsp;'.
      affiche_etoile($mes_attaques_faites_normale, 'rouge', _('Attaque faite')).'&nbsp;</td>
      <td class="centrer">&nbsp;'.
      affiche_etoile($faite_restante_n, 'rouge', _('Attaque disponible')).
      affiche_etoile($faite_restante_n2, 'rouge2', _('Attaque non disponible')).'&nbsp;</td>
      <td class="centrer">&nbsp;'.
      display_date($temps_attaque_faite_n,4).'&nbsp;</td>
  </tr>
  
  <tr class="tableau_fond0">
    <td class="gauche">&nbsp;<b>'._('En guerre').'</b>&nbsp;</td>
    <td class="centrer">&nbsp;'.
    affiche_etoile($mes_attaques_faites_guerre, 'orange', _('Attaque faite en guerre')).'&nbsp;</td>
    <td class="centrer">&nbsp;'.
    affiche_etoile($faite_restante_g, 'orange', _('Attaque disponible en guerre')).
    affiche_etoile($faite_restante_g2, 'orange2', _('Attaque non disponible en guerre')).'&nbsp;</td>
    <td class="centrer">&nbsp;'.
    display_date($temps_attaque_faite_g,4).'&nbsp;</td>
  </tr>
  
  <tr class="tableau_fond1">
    <td class="gauche">&nbsp;<b>'._('Bonus').'</b>&nbsp;</td>
    <td class="centrer">&nbsp;'.
    affiche_etoile($mes_attaques_faites_bonus, 'violet', _('Attaque bonus faite')).'&nbsp;</td>
    <td class="centrer">&nbsp;'.
    affiche_etoile($faite_restante_b, 'violet', _('Attaque bonus disponible')).
    affiche_etoile($faite_restante_b2, 'violet2', _('Attaque bonus non disponible')).'&nbsp;</td>
    <td class="centrer">&nbsp;'.
    display_date($temps_attaque_faite_b,4).'&nbsp;</td>
  </tr>
  </tbody>
</table>
<br/>
<h2 class="centrer">'._('Attaques reçues').'</h2>
<table class=\'tableau80 centrer_tableau\'>
	<thead>
	<tr>
    <td class="titre_tab">&nbsp;&nbsp;</td>
    <td class="titre_tab">&nbsp;'._('Reçues').'&nbsp;</td>
    <td class="titre_tab">&nbsp;'._('Disponibles').'&nbsp;</td>
    <td class="titre_tab">&nbsp;'._('Retour').'&nbsp;</td>
	</tr>
	</thead>
	<tfoot><tfoot>
	<tbody>
  
  <tr class="tableau_fond0">
    <td class="gauche">&nbsp;<b>'._('Hors guerre').'</b>&nbsp;</td>
    <td class="centrer">&nbsp;'.
    affiche_etoile($mes_attaques_recus_normale, 'bleu', _('Attaque reçue')).'&nbsp;</td>
    <td class="centrer">&nbsp;'.
    affiche_etoile($recue_restante_n, 'bleu', _('Attaque pouvant être reçue')).
    affiche_etoile($recue_restante_n2, 'bleu2', _('Attaque ne pouvant pas être reçue')).'&nbsp;</td>
    <td class="centrer">&nbsp;'.
    display_date($temps_attaque_recu_n,4).'&nbsp;</td>
  </tr>
  
  <tr class="tableau_fond1">
      <td class="gauche">&nbsp;<b>'._('En guerre').'</b>&nbsp;</td>
      <td class="centrer">&nbsp;'.
      affiche_etoile($mes_attaques_recus_guerre, 'vert', _('Attaque reçue en guerre')).'&nbsp;</td>
      <td class="centrer">&nbsp;'.
      affiche_etoile($recue_restante_g, 'vert', _('Attaque pouvant être reçue en guerre')).
      affiche_etoile($recue_restante_g2, 'vert2', _('Attaque ne pouvant pas être reçue en guerre')).'&nbsp;</td>
      <td class="centrer">&nbsp;'.
      display_date($temps_attaque_recu_g,4).'&nbsp;</td>
  </tr>
  </tbody>
</table>
<br/><br/>
<div class="ligne centrer">
<b>';

printf(_(
"Vous avez actuellement %s attaques bonus disponibles.<br/>".
"Une attaque bonus vous permet d'attaquer hors guerre même ".
"si vous n'avez plus d'attaques disponibles dans la limite ".
"de 5 par jour."), $attaques_bonus_dispo);

echo '</b>
<br/><br/><br/>

<a href="'._('faveurs').'"><font color="green">'._(
'Besoin de <b>15</b> attaques en plus ?').'</font></a><br/><br/><br/>'.
     affiche_etoile(1, 'rouge', _('Attaque disponible')).' '.
     affiche_etoile(1, 'rouge2', _('Attaque disponible')).' '.
     affiche_etoile(1, 'orange', _('Attaque disponible en guerre')).' '.
     affiche_etoile(1, 'orange2', _('Attaque disponible en guerre')).' '.
     affiche_etoile(1, 'violet', _('Attaque bonus disponible')).' '.
     affiche_etoile(1, 'violet2', _('Attaque bonus disponible')).' '.
     affiche_etoile(1, 'bleu', _('Attaque pouvant être reçue" ')).' '.
     affiche_etoile(1, 'bleu2', _('Attaque pouvant être reçue" ')).' '.
     affiche_etoile(1, 'vert', _('Attaque pouvant être reçue en guerre')).' '.
     affiche_etoile(1, 'vert2', _('Attaque pouvant être reçue en guerre')).'
</div>';

?>
