<?php

echo '
<div class="ligne centrer">
	<img src="images/jeux/carre_200.png"
	     alt="'._('Carré magique').'" 
	     title="'._('Carré magique').'" />
	<br/><br/>
</div>

<div class="justify ligne90 ligne_80">

<b>'._(
'Visitez les sites de nos partenaires et gagnez des drachmes. '.
'Chaque semaine, la personne qui a le plus aidée le site reçoit 1 faveur. '.
'Lorsque vous cliquez sur une des bannières, vous devrez visiter au moins '.
'deux pages pour que la visite soit enregistrée. '.
'En cas d\'égalité entre plusieurs joueurs, tous reçoivent la récompense. '.
'Les clics ne sont comptés qu\'une fois par jour.').'</b>

<br/>
<br/>
<br/>';

include('lang/'.LANG.'/include/carremagique.php');

?>
<script type="text/javascript">
function gagnerdrachme(id) {
   $.ajax({
     type: "GET",
     url: "form/form_carremagique.php",
     data: "jeu="+id
   });
}
</script>
