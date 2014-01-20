<?php

echo '
<div id="cadre_gauche">
	<div id="cadre_gauche_int">
		<h3>'._('Destinataires').'</h3>
		
		<input type="text"
		       id="destinataire" 
		       placeholder="'._('Nouveau destinataire').'"/>
		<img src="images/utils/green-cross.png"
		     alt="'._('Ajouter').'"
		     title="'._('Ajouter').'"
		     onclick="ajouter_dest()" />
		
		<div id="liste_destinataires">
		
		</div>		
	</div>
</div>

<div id="cadre_droite">

</div>';

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
					txt += '<input type="hidden" name="dest[]" id="dest_'+data.id+'">';
					txt += data.login + '<br/>';
	      	 
	      	$("#liste_destinataires").html($("#liste_destinataires").html()+txt);
	      	destinataires.push(data.id);
      	}
      }
      $("#destinataire").val('');
      $("#destinataire").focus();
    }
  });
}
</script>