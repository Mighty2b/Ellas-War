<?php

$j = $paquet -> get_answer('profils_joueur')->{1};

if(empty($j)) {
	redirect();
}

echo '<h1>'.$j->login.'</h1>
<div class="centrer">';

if(is_file('avatarjoueur/'.$j->id.'.jpg')) {
	echo '<img src=\'avatarjoueur/'.$j->id.'.jpg\'
	           alt="'._('Avatar du joueur').' '.$j->id.'" 
	           height="200px"/>';
}
elseif(is_file('avatarjoueur/'.$j->id.'.png')) {
	echo '<img src=\'avatarjoueur/'.$j->id.'.png\'
	           alt="'._('Avatar du joueur').' '.$j->id.'" 
	           height="200px"/>';
}
else {
	echo '<img src="images/joueurs/avatar.png"
	           alt="'._('Avatar par défaut').'" />';
}

echo '</div>
<div class="clear"></div><br/>
<div style="margin-left:125px;">';

foreach($j->tourforce as $tdf) {
  echo '<div class="font_hf" >
  <div class="titre_hf">'.$tdf->nom.'</div>
  <div class="txt_hf">'.$tdf->description.'</div>
  <div class="pt_hf"></div>
  </div>';
}

echo '</div><div class="clear"></div><br/>';

echo '
<script type="text/javascript">
    $(document).ready(function() {
        document.title = \'Tours de force de '.$j->login.'\';
    });
</script>';

?>