function heros_stuff() {
  $.ajax({
    type: "GET",
    url: "../form/heros_stuff.php",
    error: function(msg){
    },
    success:
      function(data) {
        $("#heros_stuff").html(data);
      }
  });
}

function fermer_cadre() {
  $("#cadre_milieu_petit").hide("slow");
}

function heros_nouveau(id) {
  $.ajax({
    type: "GET",
    url: "../form/heros_nouveau.php",
    data:"id="+id,
    error: function(msg){
    },
    success:
      function(data) {
        $("#cadre_centre_petit").html(data);
        $("#cadre_milieu_petit").show("slow");
      }
  });
}
