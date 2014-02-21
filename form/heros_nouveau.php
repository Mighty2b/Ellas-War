<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_possibles_classes');
$paquet -> send_actions();

$liste = $paquet->get_answer('get_possibles_classes')->{1};

if(empty($_GET['id']) or empty($liste->$_GET['id'])) {
	exit();
}

$heros = $liste->$_GET['id'];

echo '<h2 class="centrer">'.$heros->nom.'</h2>';

echo '<div class="ligne_80 justify">'.
     stripslashes($heros->description).
     '</div><div class="centrer"><br/><br/>';

echo '<div class="bouton_classique"><input type="submit"
                                           value="'._('Choisir').'"
                                           onclick="heros_choisir('.$heros->classe_id.')"/></div>
</div>'

?>
<script type="text/javascript">
function heros_choisir(id) {
  $.ajax({
    type: "GET",
    url: "../form/heros_creation.php",
    data:"id="+id,
    error: function(msg){
    },
    success:
      function(data) {
      	location.reload();
      }
  });
}
</script>
