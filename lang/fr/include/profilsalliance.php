<?php

	if(is_file('avataralliance/'.$all->id.'.jpg'))
		echo '<div class="ligne centrer"><img src=\'avataralliance/'.$all->id.'.jpg\' /></div>';
	elseif(is_file('avataralliance/'.$all->id.'.png'))
		echo '<div class="ligne centrer"><img src=\'avataralliance/'.$all->id.'.png\' /></div>';	
		
	echo '<div class="ligne "><table class="centrer_tableau">
	<tr>
		<td class=\'titre_profils\'>Grand chef : </td>
		<td></td>
		<td class="don_profils"><a href="profilsjoueur-'.$all->idchef.'" class="sans_soulign2">'.$all->chef.'</a>';
	if($paquet -> getstatu() == 1) {
		echo' (<a href="NouveauMessage-'.$all->idchef.'" class="lien_rouge">Contacter</a>)';
	}
 echo '</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>Fondateur : </td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td class="don_profils">'.$all->createur.'</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>Création : </td>
		<td></td>
		<td class="don_profils">'.date('d/m/Y', $all->date).'</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>'.(($all->nbmembre > 1)?'Membres':'Membre').' : </td>
		<td></td>
		<td class="don_profils">'.$all->nbmembre.' (<a href="membrealliance-'.$all->id.'" class="lien_rouge">consulter</a>)</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>XP : </td>
		<td></td>
		<td class="don_profils">'.number_format(round($all->xp), 0, ',', ' ').'</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>'.(($all->victoires>1)?'Victoires':'Victoire').'  : </td>
		<td></td>
		<td class="don_profils">'.$all->victoires.'</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>'.(($all->defaites>1)?'Défaites':'Défaite').'  : </td>
		<td></td>
		<td class="don_profils">'.$all->defaites.'</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>'.(($all->contratp > 1)?'Contrats proposés':'Contrat proposé').' : </td>
		<td></td>
		<td class="don_profils">'.$all->contratp.'</td>
	</tr>
	<tr>
		<td class=\'titre_profils\'>'.(($all->contratr > 1)?'Contrats remplis':'Contrat rempli').' : </td>
		<td></td>
		<td class="don_profils">'.$all->contratr.'</td>
		</tr>
		<tr><td colspan="3" class="centrer">&nbsp;<br/>
<div class="fb-like" style="width:100px;" data-href="'.SITE_URL.'/profilsalliance-'.$all->id.'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
	</td></tr>
	</table></div><br/>';

 echo '<div style="margin-left:357px;">
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille1.'</div>
 	<img src="images/alliance/mini-laurier-indigo.png" alt="Trophée du massacre incompréhensible" title="Trophée du massacre incompréhensible" />
</div>
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille2.'</div>
 	<img src="images/alliance/mini-laurier-noir.png" alt="Trophée de l\'orgueil naïf" title="Trophée de l\'orgueil naïf" />
</div>
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille3.'</div>
 	<img src="images/alliance/mini-laurier-bleu.png" alt="Trophée de la loyauté" title="Trophée de la loyauté" />
</div>
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille4.'</div>
 	<img src="images/alliance/mini-laurier-vert.png" alt="Trophée de la cruauté" title="Trophée de la cruauté" />
</div>
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille5.'</div>
 	<img src="images/alliance/mini-laurier-bronze.png" alt="Trophée de l\'honneur destructeur" title="Trophée de l\'honneur destructeur" />
</div>
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille6.'</div>
 	<img src="images/alliance/mini-laurier-argent.png" alt="Trophée de l\'archarnement divin" title="Trophée de l\'archarnement divin" />
</div>
<div class="laurier1">
 	 <div class="laurier2">'.$all->medaille7.'</div>
 	<img src="images/alliance/mini-laurier.png" alt="Trophée du conflit titanesque" title="Trophée du conflit titanesque" />
</div>

 <br/>	
 <br/>	
 
 		</div>';
 
	if(!empty($all->lien)) {
		echo '<br/>
		<div class="centrer">
			<a href="'.$all->lien.'" class="lien_rouge">Lien vers leur forum</a>
		</div><br/>';
	}
	
	echo '
	<div id="cadre_com_profils">
		<div id="cadre_com_profils2"></div>
			<div id="cadre_com_profils4">
	'.stripslashes(stripslashes($all->description)).'
			</div>
		<div id="cadre_com_profils3"></div>
	</div>';

?>