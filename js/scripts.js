$(function(){
	$("#bouton_deconnexion").click( function() {
    $.ajax({
      type: "GET",
      url: "form/deco.php",
      success: function(msg){ location.reload(); }
    });
  }); 
});

function simuler(taux) {
  var montant = document.getElementById('montant').value;

  if(montant != '' && montant > 0) {
    if(document.getElementById('mode').checked == true) {
      document.getElementById('simuler').innerHTML = "Dépôt de " + montant + " <img title=\"Drachme\" alt=\"Drachme\" src=\"images/drachme.jpg\">";
    }
    else {
      if(document.getElementById('calcul').checked == true) {
        document.getElementById('simuler').innerHTML = "Retrait de " + montant* (100-taux)/100 + " <img title=\"Drachme\" alt=\"Drachme\" src=\"images/drachme.jpg\">";
      }
      else {
        document.getElementById('simuler').innerHTML = "Retrait de " + Math.floor(10000*montant/ (100-taux))/100 + " <img title=\"Drachme\" alt=\"Drachme\" src=\"images/drachme.jpg\">";
      }
    }
  }
}

function menu_visible(menu) {

  var menu_dynamique = get_menu_dynamique();
  
  if(menu_dynamique == 0)
    return;
  
  if($("#"+menu).hasClass("menuh_visible") == false) {
    $(".menuh_visible").hide("slow");
    $(".menuh_visible").addClass("menuh_invisible");
    $(".menuh_visible").removeClass("menuh_visible");
    $("#"+menu).show("slow");
    $("#"+menu).addClass("menuh_visible");
  }
}

function programme(id) {
   $.ajax({
     type: "GET",
     url: "form/programme.php",
     data: "id="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}

function get_menu_dynamique() {
  var menu_dynamique = parseInt(readCookie('menu_dynamique'));

  if(menu_dynamique != 0 && menu_dynamique != 1) {
    menu_dynamique = 0;
    createCookie('menu_dynamique', menu_dynamique, 365);
  }
  
  return menu_dynamique;
}


function observer(id) {
   $.ajax({
     type: "GET",
     url: "form/observer.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function espionner(id) {
   $.ajax({
     type: "GET",
     url: "form/espionner.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function visiter(id) {
   $.ajax({
     type: "GET",
     url: "form/visiter.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function furie(id) {
   $.ajax({
     type: "GET",
     url: "form/furie.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function foudre(id) {
   $.ajax({
     type: "GET",
     url: "form/foudre.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function preparer(id) {
   $.ajax({
     type: "GET",
     url: "form/preparer.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function attaquer(id) {
   $("#bouton_attaquer").hide();
   $("#encours").html('<b>Attaque en cours</b>');
   $.ajax({
     type: "GET",
     url: "form/attaquer.php",
     data: "ciblej="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function fermer_pacte() {
  $("#cadre_milieu_petit").hide("slow");
}

function etape_suivante() {
   $.ajax({
     type: "GET",
     url: "form/etape_suivante.php",
     success: function(msg){ $("#etape").html(msg); }
   });
}

function affiche_cache(id)
{
	if(document.getElementById(id).style.display == 'none') {
		document.getElementById(id).style.display='';
	}
	else {
		document.getElementById(id).style.display='none';
	}
}

function voir_historique(id) {

var menu = $("#historique_num"+id);
	
	if(menu.hasClass("ouvert")) {
		menu.hide("slow");
		menu.removeClass("ouvert");
	}
	else {
		menu.addClass("ouvert");
		menu.show("slow");
	}
}

function voir_archive(id) {

var menu = $("#historique_num"+id);
	
	if(menu.hasClass("ouvert")) {
		menu.hide("slow");
		menu.removeClass("ouvert");
	}
	else {
		menu.addClass("ouvert");
		menu.show("slow");
	}
}

function gestion_permalien(id) {
	$.ajax({
		type: "GET",
		url: "form/archive_publier.php",
		data: "id="+id,
		success: function(msg){ $("#gestion_permalien_"+id).html(msg); }
	});
}

function retour_pause() {
   $.ajax({
     type: "GET",
     url: "form/retour_pause.php",
     /*data: "jeu="+id,*/
     success: function(msg){ location.reload(); }
   });
}

function reset() {
   $.ajax({
     type: "GET",
     url: "form/reset.php",
     /*data: "jeu="+id,*/
     success: function(msg){ location.reload(); }
   });
}

function passer_lvl(lvl) {
   $.ajax({
     type: "GET",
     url: "form/formlvl"+lvl+".php",
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function passer_lvlalliance() {
   $.ajax({
     type: "GET",
     url: "form/formlvlalliance.php",
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function prendre_ticket() {
   $.ajax({
     type: "GET",
     url: "form/ticket.php",
     success: function(msg){ $("#cadre_ticket").html(msg);$("#cadre_ticket").show("slow"); }
   });
}

function construire(bat) {
	var cadre = $("#cadre_batiment_cache");
	cadre.html('');
	if(cadre.hasClass('affiche')) {
			cadre.css("top", "+=500")
	}
	else {
		cadre.addClass('affiche');
	}
	
	$.ajax({
		type: "GET",
		url: "form/construire.php",
    data: "bat="+bat,
		success: function(msg){ cadre.html(msg); }
	});

	cadre.animate({
		top:-500
	}, 1000);
}

function engager(bat) {
	var cadre = $("#cadre_batiment_cache");
	cadre.html('');
	if(cadre.hasClass('affiche')) {
			cadre.css("top", "+=500")
	}
	else {
		cadre.addClass('affiche');
	}
	
	$.ajax({
		type: "GET",
		url: "form/engager.php",
    data: "unite="+bat,
		success: function(msg){ cadre.html(msg); }
	});

	cadre.animate({
		top:-500
	}, 1000);
}

function gain_ticket() {
   $.ajax({
     type: "GET",
     url: "form/gain_ticket.php"
   });
}

function annuler_candidature(id){
   $.ajax({
     type: "GET",
     url: "form/annuler_candidature.php"
   });
   $("#cadre_candidature").hide("slow");
}

function changer_recrutement() {
   $.ajax({
     type: "GET",
     url: "form/changer_recrutement.php"/*,
     data: "jeu="+id*/,
     success: function(msg){ $("#fermer_recrutement").html(msg);}
   });
}

function recruter(id, action) {
	$("#cadre_recrutement_"+id).hide("slow");
	$("#cadre_recrutement2_"+id).hide("slow");
   $.ajax({
     type: "GET",
     url: "form/recrutement.php",
     data: "joueur="+id+"&action="+action,
     success: function(msg){ $("#affichage_erreur").html(msg);}
   });
}

function accepter_demande(demande, action) {
   $.ajax({
     type: "GET",
     url: "form/coffre_demande.php",
     data: "demande="+demande+"&action="+action/*,
     success: function(msg){ $("#affichage_erreur").html(msg);}*/
   });
   $("#cadre_demande_"+demande).hide("slow");
}

function expulser(id) {
	$.ajax({
		type: "GET",
		url: "form/expulser.php",
		data: "id="+id
	});
	$("#ligne_"+id).hide("slow");
}

function demande_pacte(id) {
   $.ajax({
     type: "GET",
     url: "form/demander_pacte.php",
     data: "alliance="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function declarer(id) {
   $.ajax({
     type: "GET",
     url: "form/declarer.php",
     data: "alliance="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function declarer_contrat(id) {
   $.ajax({
     type: "GET",
     url: "form/declarer_contrat.php",
     data: "alliance="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function declarer_blocus(id) {
   $.ajax({
     type: "GET",
     url: "form/declarer_blocus.php",
     data: "alliance="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}

function fermer_pacte() {
	$("#cadre_milieu_petit").hide("slow");
}

function fermer_archive() {
	$("#cadre_milieu_archive").hide("slow");
	$.ajax({
		type: "GET",
		url: "form/marquer_archives.php",
		success: function(msg){ $("#cadre_milieu_petit").show("slow"); }
	});
}

function next_archive() {
	$.ajax({
		type: "GET",
		url: "form/next_archive.php",
		success: function(msg){
		$("#cadre_centre_archive").hide("slow");
		$("#cadre_centre_archive").html(msg);
		$("#cadre_centre_archive").show("slow"); }
	});
}

function gestion_pacte(id, action) {
	$.ajax({
		type: "GET",
		url: "form/gestion_pacte.php",
		data: "id="+id+"&action="+action,
		success: function(msg){ location.reload(); }
	});
}

function engager_nb(id, nb) {
	$("#"+id).val(nb);
}

function gagnerdrachme(id) {
   $.ajax({
     type: "GET",
     url: "form/gaindrachme.php",
     data: "jeu="+id/*,
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }*/
   });
}

function menu_visible(variable) {

}

function arbre_total_niveau(arbre, niveau) {
  total = 0;
  for(i=0;i<niveau;i++) {
    total += arbre_points[arbre][i];
  }
  return total;
}

function arbre_incremente(id, arbre, niveau, max) {
  var valeur = parseInt($("#arbre_case_"+id).html());
  if(valeur < max && arbre_points_disponibles > 0) {
    if(niveau > 0) {
      var total = arbre_total_niveau(arbre, niveau);
    }
    else {
      var total = 0;
    }

    if(valeur < 5) {
      if(total >= niveau*5) {
        $.ajax({
          type: "GET",
          url: "form/form_arbre.php",
          data: "id="+id,
          success: function(msg) {
		        $("#arbre_case_"+id).html(valeur+1);
		        arbre_points[arbre][niveau]++;
		        arbre_points_disponibles--;
		        if(msg == arbre_points_disponibles) {
		        	$("#points_disponibles").html(arbre_points_disponibles);
		        }
		        else {
		        	location.reload();
		        }
          }
        });
      }
    }
  }
}

function arbre_decremente(id, arbre, niveau) {/*
  var valeur = parseInt($("#arbre_case_"+id).html());
  var total  = arbre_total_niveau(arbre, arbre_points[arbre].length);
  
  if(arbre_points[arbre].length > niveau) {
    var dessus = total - arbre_total_niveau(arbre, niveau+1);
  }
  else {
    var dessus = 0;
  }

  var avant = arbre_total_niveau(arbre, niveau);
  var actu  = total - dessus - avant;

  if(valeur > 0) {
    //Si les niveau au dessus sont vides ou qu'au même niveau il y a + de 5 points
    if(dessus == 0 || actu > 5) {
      $("#arbre_case_"+id).html(valeur-1);
      arbre_points[arbre][niveau]--;
      arbre_points_disponibles++;
      $("#points_disponibles").html(arbre_points_disponibles);
    }
  }*/
}

function cocher2(i) {
  if(document.getElementById("et").checked)
  {
    for(var a=1;a<=i;a++)
    {
      document.getElementById("dest"+a).checked=true;
    }
  }
}

function decoche() {
  if(document.getElementById("et").checked)
  {
    document.getElementById("et").checked=false;
  }
}

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

function constituer_groupe(id) {
  $("#cadre_centre_petit").html('');
  $("#cadre_milieu_petit").show("slow");
  form_constituer_groupe(id);
  setInterval('form_constituer_groupe('+id+')', 4000);
}

function je_suis_pret() {
    $.ajax({
     type: "GET",
     url: "form/form_je_suis_pret.php",
     success: function(msg){ $("#bouton_je_suis_pret").hide(); }
   });
}

function continuer_groupe() {
    $.ajax({
     type: "GET",
     url: "form/continuer_groupe.php",
     success: function(msg){ $("#bouton_continuer_groupe").hide();
                             $("#sanctuaire_rapport").html(msg);}
   });
}

function form_constituer_groupe(id) {

    $.ajax({
     type: "GET",
     url: "form/constituer_groupe.php",
     data: "id="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg); }
   });
}

function demander_fusion(id) {
	$.ajax({
		type: "GET",
		url: "form/demander_fusion.php",
		data: "id="+id,
		success: function(msg){ location.reload(); }
	});
}

function annuler_fusion(id) {
	$.ajax({
		type: "GET",
		url: "form/annuler_fusion.php",
		data: "id="+id,
		success: function(msg){ location.reload(); }
	});
}

function info_carte(id) {
	$.ajax({
		type: "GET",
		url: "form/info_carte.php",
		data: "partie="+id,
		success: function(msg){ $("#cadre_btn").html(msg); }
	});
}

function info_case(btn, x, y) {
   $.ajax({
     type: "GET",
     url: "form/info_case.php",
     data: "btn=" + btn + "&x=" + x + "&y=" + y,
     success: function(msg){ $("#info_btn").show("slow"); $("#info_btn").html(msg); }
   });
}

function select_tout_mp(nb) {
	if(nb > 0) {
		for(var a=1;a<=nb;a++) {
			document.getElementById("message_"+a).checked=true;
		}
	}
}

function annuler_depart_urgent() {
   $.ajax({
	     type: "GET",
	     url: "form/annuler_depart_urgent.php"
	   });
   $("#sortie_urgence").hide("slow");
}

function achat_unite(btn, x, y, unite) {
  var nb = $("#engager_"+unite).val();

   $.ajax({
     type: "GET",
     url: "form/info_case.php",
     data: "btn=" + btn + "&x=" + x + "&y=" + y + "&unite=" + unite + "&nb=" + nb,
     success: function(msg){ $("#info_btn").show("slow"); $("#info_btn").html(msg);info_carte(btn); }
   });
}

function deplacer_unite(btn, x, y) {
  var unite1 = $("#unite1").val();
  var unite2 = $("#unite2").val();
  var unite3 = $("#unite3").val();
  var unite4 = $("#unite4").val();
  var dest   = $("#destination").val();

   $.ajax({
     type: "GET",
     url: "form/info_case.php",
     data: "btn=" + btn + "&x=" + x + "&y=" + y + "&unite1=" + unite1 + 
           "&unite2=" + unite2 + "&unite3=" + unite3 + "&unite4=" + unite4 + 
           "&destination=" + dest,
     success: function(msg){ $("#info_btn").show("slow"); $("#info_btn").html(msg);info_carte(btn); }
   });
}

function envoyer_chat() {
  var texte = $("#texte_chat").val();
  $("#texte_chat").val('');
  if(texte != '') {
    $.ajax({
      type: "GET",
      url: "form/envoyer_chat.php",
      data: "texte=" + texte
    });
  }
}

function refresh_chat() {
   $.ajax({
     type: "GET",
     url: "form/refresh_chat.php",
     success: function(msg){
      $("#corps_chat").html($("#corps_chat").html()+msg);
      document.getElementById("corps_chat").scrollTop = document.getElementById("corps_chat").scrollHeight;
     }
   });
}

function joueurs_chat() {
   $.ajax({
     type: "GET",
     url: "form/joueurs_chat.php",
     success: function(msg){
      $("#joueurs_chat2").html(msg);
     }
   });
}

function preparer_event(type) {
	$(".soutien").hide();
	$("#cadre_centre_petit2").html('');
	$("#cadre_milieu_petit").show("slow");
	$("#stv_"+type+".soutien").show();
}

function event_jeu(event,type) {
	$.ajax({
		type: "GET",
		url: "form/event_jeu.php?jeu="+event,
        success: function(msg){
        	if(type == 0)
        		$(".soutien").hide();
        	$("#cadre_centre_petit2").html(msg);
        	$("#cadre_milieu_petit").show("slow");
        	even_maj(event);
        }
   });
}

function even_maj(event) {
	$.ajax({
		type: "GET",
		url: "form/even_maj.php",
		data: "event="+event,
		success: function(msg){
			if(event == 'recherche') {
				$("#valeur_stv_recherche").html(msg);
				if(msg >= 5) {
					$("#bouton_stv_recherche").hide();
				}
			}
			else if(event == 'parade') {
				$("#valeur_stv_parade").html(msg);
				if(msg >= 1) {
					$("#bouton_stv_parade").hide();
				}
			}
			else if(event == 'amphore' ||
					event == 'babiole' ||
					event == 'coupe') {
				$("#valeur_stv_present").html(msg);
				if(msg >= 5) {
					$("#bouton_stv_present").hide();
				}
			}
		}
	});
}
