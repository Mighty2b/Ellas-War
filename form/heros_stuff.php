<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_hero');
$paquet -> send_actions();

$heros = $paquet->get_answer('get_hero')->{1};

echo '
<div class="ligne cadre">
	<div class="stuff_objet" id="emplacement_1">';
	if(!empty($heros->liste_objets->{1}) && $heros->liste_objets->{1} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(1);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{1}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{1},0,1);
		echo '</div>';
	}
	
	echo '</div>
	<div class="stuff_objet" id="emplacement_2">';
	if(!empty($heros->liste_objets->{2}) && $heros->liste_objets->{2} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(2);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{2}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{2},0,1);
		echo '</div>';
	}
	
	echo '</div>
	<div class="stuff_objet" id="emplacement_3">';
	if(!empty($heros->liste_objets->{3}) && $heros->liste_objets->{3} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(3);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{3}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{3},0,1);
		echo '</div>';
	}
	
	echo '</div>
	<div class="stuff_objet" id="emplacement_4">';
	if(!empty($heros->liste_objets->{4}) && $heros->liste_objets->{4} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(4);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{4}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{4},0,1);
		echo '</div>';
	}
	
	echo '</div>
	<div class="stuff_objet" id="emplacement_5">';
	if(!empty($heros->liste_objets->{5}) && $heros->liste_objets->{5} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(5);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{5}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{5},0,1);
		echo '</div>';
	}
	
	echo '</div>
</div>
<div class="ligne cadre">
	<div class="stuff_objet" id="emplacement_6">';
	if(!empty($heros->liste_objets->{6}) && $heros->liste_objets->{6} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(6);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{6}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{6},0,1);
		echo '</div>';
	}
	
	echo '</div>
	<div class="stuff_objet" id="emplacement_7">';
	if(!empty($heros->liste_objets->{7}) && $heros->liste_objets->{7} != null) {
		echo '<div class="stuff_deplacable"
	           onmouseover="set_current_objet(7);"
	           style="background-image:url(\'game/'.GAME.'/images/stuff/'.$heros->liste_objets->{7}->get_skin().'.png\');">
	           ';
		information_objet($heros->liste_objets->{7},0,1);
		echo '</div>';
	}
	
	echo '</div>
</div>';

?>
<script type="text/javascript">
$(".stuff_objet").droppable({
	accept: '.stuff_deplacable',
	drop: function( event, ui ) {
		var typeItem = $(this).attr("id");
		//On controle si l'action était possible et on l'enregistre
		$.ajax({
			type: "GET",
			url: "../game/delire/form/equiper_piece.php",
			data: {'dest':typeItem, 'source':current_emplacement},
			error: function(msg){
			},
			success:
				function(data) {
					//On recharge la page
					form('personnage_stuff');
					form('contenu_sac');
					form('personnage_stats');
				}
		});
	}
}).mouseover(function() {
	$(this).find(".information_objet").show();
}).mouseout(function(){
	$(this).find(".information_objet").hide();
});

$(".stuff_deplacable").draggable({
	revert: "invalid",
	drag: function( event, ui ) {
		$(this).find(".information_objet").hide();
	},
	start: function( event, ui ) {
		$(this).addClass('haut_dessus');
	},
	stop: function( event, ui ) {

	}
}).mouseover(function() {
	$(this).find(".information_objet").show();
}).mouseout(function(){
	$(this).find(".information_objet").hide();
});
</script>