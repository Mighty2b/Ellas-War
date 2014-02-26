function deco() {
  $.ajax({
    type: "GET",
    url: "../form/form_deconnexion.php",
    success: function(msg) {
      location.reload();
    }
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

