<h1><?php echo $ennemis->nom; ?></h1>
<div class="centrer">
Etes vous sûr de vouloir déclarer la guerre ?
<br/><br/>
<form action='#' method='post' name='declarer'>
Accepter la paix contre des ressources : <input type="checkbox" name="ultimatum" />
<p>
<input type="text" name="drachmes" size="5" value="0" maxlength="8" class="form_retirer"/> <img src="/images/ress/drachme.jpg" alt="drachme" /> Drachmes (Entre <b><?php echo nbf($minidrachmes);?></b> et <b><?php echo nbf($maxdrachmes);?></b> unités)<br/>
<input type="text" name="or" size="3" value="0" maxlength="8" class="form_retirer" /> <img src="/images/ress/or.jpg" alt="or" /> Or (Entre <b><?php echo nbf($minior);?></b> et <b><?php echo nbf($maxor);?></b> unités)
</p>
<div class="ligne centrer"><i>Lorsque la guerre est déclaré elle ne commencera que <b><?php echo $tempsultimatum;?></b> heures plus tard. Pendant cette période,<br/>si la case est cochée, vous pouvez accepter la paix si l'adversaire donne à votre alliance les ressources indiquées. Lorsque vous cliquez sur Déclarer vous ne pourrez plus revenir en arrière !<br/>Que le meilleur gagne, bonne chance !</i></div>
<div class="ligne">
<input type="hidden" name="declarer" value="<?php echo $ennemis->id;?>" />

<br/><br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VALIDER" /></div>
</div>
</form>
</div>