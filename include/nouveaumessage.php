<?php

$alli = $paquet->get_infoj('alliance');

if(!empty($alli) && !empty($_GET['var3'])) {
	include('include/menu_monalliance.php');
	echo '<br/>';
}

$nouveaux_messages = $paquet->get_answer('nouveaux_messages');

if(!empty($nouveaux_messages) &&
   !empty($nouveaux_messages->{1})) {
	$rep = $nouveaux_messages->{1};
	
	if(!empty($rep) && sizeof($rep) >= 1) {
		echo '<div class="erreur">';
		echo display_error($rep[0]);
		echo '<br/><br/></div>';	
	}	
}

if(!empty($_GET['var2'])) {
	$res   = get_message($_GET['var2'], array($paquet->get_infoj('alliance')));
	$title = $res['titre'];
	$text  = $res['message'];
}
else {
	$title = '';
	$text  = '';
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
	       value="'.$title.'"
	       required="required"/>
	<br/><br/>
	<textarea name="texte" 
	          placeholder="'._('Message').'"
	          rows="15" cols="80"/>'.$text.'</textarea>
	<br/><br/>
	<div class="bouton_classique"><input type="submit"
	                                     id="submit"
	                                     name="changer" 
	                                     value="'._('Envoyer').'"
	                                     onclick="ajouter_dest()" /></div>
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

$("#destinataire").focusout(function() {
	ajouter_dest();
});

function ajouter_dest() {
	
	var login = $("#destinataire").val();
	
	if(login != '') {
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
}

<?php 

$profils_alli = $paquet -> get_answer('profils_alliance');

if(!empty($_GET['var1'])) {
	echo '$("#destinataire").val('.$_GET['var1'].');
	      ajouter_dest();';
}
elseif(!empty($_GET['var3']) && 
       !empty($profils_alli)) {
	$all = $paquet -> get_answer('profils_alliance')->{1};
	if(!empty($all)) {
		$liste = $all->membres;
		
		foreach ($liste as $do) {
			echo '$("#destinataire").val('.$do->id.');
			      ajouter_dest();';
		}
	}
}

?>
</script>