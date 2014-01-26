<?php

if(!empty($paquet->get_answer('nouveaux_messages')) &&
   !empty($paquet->get_answer('nouveaux_messages')->{1})) {
	$rep = $paquet->get_answer('nouveaux_messages')->{1};
	
	if(!empty($rep) && sizeof($rep) >= 1) {
		echo '<div class="erreur">';
		echo display_error($rep[0]);
		echo '<br/><br/></div>';	
	}	
}

echo '
<form method="post" action="#">
<div id="cadre_gauche">
	<div id="cadre_gauche_int">
		<h3>'._('Destinataires').'</h3>
		
		<input type="text"
		       id="destinataire" 
		       placeholder="'._('Nouveau destinataire').'"
		       required="required"/>
		<img src="images/utils/green-cross.png"
		     alt="'._('Ajouter').'"
		     title="'._('Ajouter').'"
		     onclick="ajouter_dest()" />
		
		<div id="liste_destinataires" style="display:none;">
		
		</div>		
	</div>
</div>

<div id="cadre_droite" class="centrer">

	<input type="text"
	       placeholder="'._('Titre du message').'"
	       name="titre"
	       size="50"
	       required="required"/>
	<br/><br/>
	<textarea name="texte" 
	          placeholder="'._('Message').'"
	          rows="15" cols="80"/></textarea>
	<br/><br/>
	<div class="bouton_classique"><input type="submit" 
	                                     name="changer" 
	                                     value="'._('Envoyer').'" /></div>
</div>
</form>';

?>

<script type="text/javascript">

var destinataires = [];
$("#destinataire").focus();

$(document).keypress(function(e) {
    if(e.which == 13) {
        ajouter_dest();
    }
});

function ajouter_dest() {
	
	var login = $("#destinataire").val();
	
  $.ajax({
    type: "GET",
    url: "../form/form_mpaddlogin.php",
    data: "id="+login,
    success: function(msg) {
    	
    	var data = jQuery.parseJSON(msg);
    	
      if(data != null && data.id != 0) {
      	if(jQuery.inArray(data.id, destinataires) == -1) { 
	      	var txt = '';
					txt += '<input type="hidden" name="dest[]" id="dest_'+data.id+'" value="'+data.id+'">';
					txt += data.login + '<br/>';
	      	
	      	$("#liste_destinataires").show();
	      	$("#liste_destinataires").html($("#liste_destinataires").html()+txt);
	      	destinataires.push(data.id);
	      	$("#destinataire").removeAttr("required");
      	}
      }
      $("#destinataire").val('');
      $("#destinataire").focus();
    }
  });
}
</script>