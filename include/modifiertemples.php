<?php

include('donnees/donnees.php');

if($paquet->get_infoj('lvl') < 10) {
	redirect();
}

$possible = $paquet->get_answer('possible_changer_temple')->{1};

if(empty($possible)) {
	
	$paquet->error('changer_temple');
	
echo '
<div class="rouge_goco gras ligne_80 justify"><br/>'._(
'La modification des temples est soumise à des règles très strictes. '.
'Vous ne pouvez changer qu\'un temple tous les six mois. Cette '.
'modification est irrémédiable et vous obligera à attendre de nouveau '.
'six mois en cas d\'erreur, en aucun cas le staff ne pourra intervenir.').'
<br/>
</div>

<div class="ligne centrer" id="prix_temple">

</div>
<div class="ligne">
<form method="post" action="">
<table class="none">
<tr>
	<td>
	<select name="temple"
	        required="required" 
	        onchange="javascript:modifier_temple(this.value);">
		<option value="">&nbsp;</option>';
		
		$temples = $paquet->get_infoj('temples');
		foreach($temples as $index) {
			echo '<option value="'.$index.'">'.
			$temples_donnees[$index]['nom'].'</option>';
		}
		
		echo '
	</select>
	</td>
	<td>
	<select name="nouveau"
	        required="required" 
	        id="changement_temple">
		<option value="">&nbsp;</option>
	</select>
	</td>
	<td>
		<div class="bouton_classique"><input type="submit"
		                                     value="'._('MODIFIER').'" 
		                                     name="'._('MODIFIER').'" /></div>
	</td>
</tr>
</table>
</form>
</div>

<script type="text/javascript">
function modifier_temple(id) {

   $.ajax({
     type: "GET",
     url: "form/modifier_temple.php",
     data: "id="+id,
     success: function(msg){ $("#changement_temple").html(msg);}
   });
   
   $.ajax({
     type: "GET",
     url: "form/prix_temple.php",
     data: "id="+id,
     success: function(msg){ $("#prix_temple").html(msg);}
   });
}
</script>';

}
else {
	echo '<div class="erreur ligne centrer"><br/>';
	printf(_(	'Vous avez changé de temple recement, prochain changement possible dans %s jours.'),round(($possible-time())/(24*3600)));
	echo '</div>';
}

?>