<?php

echo '<div id="cadre_chat">
	<div id="cadre_chat_titre" class="cursor">'._('Chat').'</div>
	<div id="cadre_chat_interieur" style="display:none;">
		<div id="cadre_chat_interieur_gauche">
				<div id="corps_chat"></div>
				<input type="text" id="texte_chat" />
				<div class="bouton_classique"><input type="submit"
				                                     value="'._('Envoyer').'" 
				                                     name="Envoyer"
				                                     onclick="envoyer_chat()" /></div>
		</div>
		<div id="cadre_chat_interieur_droite">
				<div id="joueurs_chat"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function() {
	joueurs_chat();
	refresh_chat(1);
});

$("#texte_chat").keyup(function(e) {
  if(e.keyCode == 13) {
    envoyer_chat();
  }
});

setInterval(\'joueurs_chat()\',3000);
setInterval(\'refresh_chat(0)\',1000);

$("#cadre_chat_titre").click(function() {
	$("#cadre_chat_titre").hide();
	$("#cadre_chat").css(\'height\', \'auto\');
	$("#cadre_chat").css(\'width\', \'auto\');
	$("#cadre_chat_interieur").show(\'slow\');
});

function joueurs_chat() {
   $.ajax({
     type: "GET",
     url: "form/chat_joueurs.php",
     success: function(msg){
      $("#joueurs_chat").html(msg);
     }
   });
}

function envoyer_chat() {
  var texte = $("#texte_chat").val();
  $("#texte_chat").val(\'\');
  if(texte != \'\') {
    $.ajax({
      type: "GET",
      url: "form/chat_envoyer.php",
      data: "texte=" + texte
    });
  }
}

function refresh_chat(clean) {
   $.ajax({
     type: "GET",
     url: "form/chat_refresh.php?clean="+clean,
     success: function(msg){
       if(msg != \'\') {
         $("#corps_chat").html(msg);
         document.getElementById("corps_chat").scrollTop = document.getElementById("corps_chat").scrollHeight;
       }
     }
   });
}
</script>';

?>