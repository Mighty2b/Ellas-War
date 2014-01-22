<?php

if($paquet->get_infoj('lvl') < 10) {
	$actu= unserialize($paquet->get_answer('get_objectifs_lvl')->{1});
	$obj = unserialize($paquet->get_answer('get_objectifs_lvl')->{2});
	
	echo '<h1>'._('Vos objectifs pour passer niveau 1').'</h1><br/>';
}

include('include/vosobjectifs'.$paquet->get_infoj('lvl').'.php');

?>
<br/>
<script type="text/javascript">
function passer_lvl(lvl) {
   $.ajax({
     type: "GET",
     url: "form/formlvl"+lvl+".php",
     success: function(msg){
     	$("#cadre_centre_petit").html(msg);
     	$("#cadre_milieu_petit").show("slow");
     }
   });
}
</script>
