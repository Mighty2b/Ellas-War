<?php

echo '<div id="cadre_chat">
	<div id="cadre_chat_titre" class="cursor"><span id="cadre_chat_titre2">'._('Chat').
	'&nbsp;'.
	'<img src="images/utils/mb_deconnecter.png"
	      alt="'._('Connexion au chat').'"
	      id="cadre_chat_iconeco">&nbsp;</span>'.
	'<img src="images/utils/right.png"
	 			alt="Deconnexion"
	      id="cadre_chat_iconedeco"
	      style="display:none;">
	 </div>
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
				<div id="cadre_chat_fermer">
				<img src="images/utils/supprimer_mp.png"
				     alt="Fermer"
				     class="cursor"
				     id="cadre_chat_iconefermer">	 
				
				<img src="images/utils/right.png"
					 			alt="Deconnexion"
					      id="cadre_chat_iconedeco2"
					      class="cursor">
					      
				</div>
				<div class="clear"></div>
				<div id="joueurs_chat"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
/*** Node Part ***/
var socket = io.connect("'.NODE_URL.'");
socket.emit(\'ewAuth\', readCookie(\'token\'));
var myId='.$paquet->get_infoj('id').';
socket.emit(\'chatUser\');
$("#texte_chat").keyup(function(e) {
  if(e.keyCode == 13) {
    envoyer_chat();
  }
});

$("#cadre_chat_titre2").mouseover(function() {
	display_chat();
});

$("#cadre_chat_titre2").click(function() {
	display_chat();
});

$("#cadre_chat_interieur").mouseleave(function() {
	close_chat();
});

$("#cadre_chat_iconefermer").click(function() {
	close_chat();
});

$("#cadre_chat_iconedeco").click(function() {
	socket.emit(\'chatDeco\');
	$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
	$("#cadre_chat_iconedeco").hide();
});

$("#cadre_chat_iconedeco2").click(function() {
	$("#cadre_chat").css(\'height\', \'auto\');
	$("#cadre_chat").css(\'width\', \'auto\');
	$("#cadre_chat_interieur").hide(\'slow\');
	$("#cadre_chat_titre2").css("color", "black");
	$("#cadre_chat_titre").show();
	socket.emit(\'chatDeco\');
	$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
	$("#cadre_chat_iconedeco").hide();
});

function display_chat() {
	socket.emit(\'chatJoin\');
	$("#cadre_chat_titre").hide();
	$("#cadre_chat_iconeco").attr("src", "images/utils/mb_connecter.png");
	$("#cadre_chat_interieur").show(\'slow\');
	$("#cadre_chat").css(\'height\', \'auto\');
	$("#cadre_chat").css(\'width\', \'auto\');
	$("#texte_chat").html(\'\');
	$("#texte_chat").focus();
	document.getElementById("corps_chat").scrollTop = document.getElementById("corps_chat").scrollHeight;
}

function close_chat() {
	$("#cadre_chat").css(\'height\', \'auto\');
	$("#cadre_chat").css(\'width\', \'auto\');
	$("#cadre_chat_interieur").hide(\'slow\');
	$("#cadre_chat_titre2").css("color", "black");
	$("#cadre_chat_titre").show();
}

function envoyer_chat() {
	var texte = $("#texte_chat").val();
	$("#texte_chat").val(\'\');
	if(texte != \'\') {
		socket.emit(\'chatSend\', texte);
	}
}

/*** Events ***/
socket.on(\'chatJoin\', function() {
	socket.emit(\'chatUser\');
});

socket.on(\'chatSend\', function(chat) {
	$("#corps_chat").html($("#corps_chat").html()+\'<b>\'+chat[0].login+\' :</b>\'+chat[0].msg+\'<br/>\');
	document.getElementById("corps_chat").scrollTop = document.getElementById("corps_chat").scrollHeight;
});

socket.on(\'chatUser\', function(users) {
	$("#joueurs_chat").html(\'\');
	var me=0;
	var txt;
	for(var i = 0; i < users.length; i++) {
		if(users[i].level == 3) {
			txt = \'<b><a href="/'._('profilsjoueur').'-\'+users[i].joueur+\'"\'+
			              \'target="_blank" class="erreur" >\'+users[i].login+\'</a></b><br/>\';
		}
		else {
			txt = \'<b><a href="/'._('profilsjoueur').'-\'+users[i].joueur+\'"\'+
			              \'target="_blank" >\'+users[i].login+\'</a></b><br/>\';
		}
		$("#joueurs_chat").html($("#joueurs_chat").html()+txt);
		if(users[i].joueur == myId) {
			me=1;
		}
	}
	if(me == 1) {
		$("#cadre_chat_iconeco").attr("src", "images/utils/mb_connecter.png");
	}
	else {
		$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
	}
});

socket.on(\'chatMsg\', function(chat) {
	$("#corps_chat").html(\'\');
	for(var i = chat.length-1; i >= 0; i--) {
		$("#corps_chat").html($("#corps_chat").html()+\'<b>\'+chat[i].login+\' :</b>\'+chat[i].msg+\'<br/>\');
	}
});
</script>';

?>
