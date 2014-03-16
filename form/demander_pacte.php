<?php

include('../header.php');

if(empty($_GET['alliance']) or !is_numeric($_GET['alliance'])) {
	redirect();
}

$paquet = new EwPaquet();
$paquet -> add_action('form_pacte', array($_GET['alliance']));
$paquet -> send_actions();

$alliance = $paquet->get_answer('form_pacte')->{1};
$possible = $paquet->get_answer('form_pacte')->{2};

if($possible == false or empty($alliance -> nom))
	redirect();

echo '<div class="ligne centrer">
<b>';
printf(_('Mettez vos motivations pour demander un pacte à l\'alliance %s'),$alliance -> nom);

echo '<br/>'.
_('Un pacte vous coûtera').' '.nbf(750000).' '.imress('drachme').
'.</b></br></br>
<form action="#" method="post">
<input type="hidden"
       name="alliance" 
       value="'.$alliance->id.'" />
<textarea name="motivation"
          rows="8" 
          cols="45" 
          required="required"></textarea><br/><br/>
<div class="bouton_classique"><input type="submit" 
                                     name="DEMANDER" 
                                     value="'._('DEMANDER').'" /></div>
</form>';


?>