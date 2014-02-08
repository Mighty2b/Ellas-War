<?php

echo '<h1>'._('Chat d\'Ellàs War').'</h1>';

echo '<div class="ligne_80">'._(
'Le lien vers le chat se trouve en bas à droite de votre écran. '.
'Il vous suffit de cliquer sur celui-ci pour y acceder. '.
'Une boulle verte indique que vous êtes connecté au chat et '.
'une boulle rouge que vous n\'êtes pas connecté. '.
'Lors de l\'arrivée d\'un nouveau message, le texte du bouton '.
'chat apparaît en rouge. '.
'Lorsque vous êtes sur le chat la croix rouge vous permet de '.
'fermer la fenetre. La flècge rouge vous permet de vous '.
'deconnecter du chat.').'</div>';


echo '<h2 class="centrer">'._('Signalement d\'un nouveau message').'</h1>';

echo '<div class="centrer">

<select name="signalement" id="signalement">
	<option value="0">'._('Aucun').'</option>
	<option value="1">'._('Sonnerie').'</option>
	<option value="2">'._('Pet').'</option>
</select><br/>
	<br/><div class="bouton_classique"><input type="submit"
	                                     name="changer" 
	                                     value="'._('Enregistrer').'"
	                                     onclick="signalement();" /></div>

</div>

<script type="text/javascript">
function signalement(clean) {
	 var signalement=$("#signalement").val();
   $.ajax({
     type: "GET",
     url: "form/chat_signalement.php?id="+signalement,
     success: function(msg){

     }
   });
}
</script>';

if(!empty($_COOKIE['signalement'])) {
	echo '<script type="text/javascript">
	$("#signalement").val('.$_COOKIE['signalement'].');
	</script>';
}

?>