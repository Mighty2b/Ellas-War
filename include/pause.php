<?php

echo '<h1>'._('Pause').'</h1><br/>';

$paquet->error('pause');

echo '<div class="ligne_80 centrer">
	<p>'._(
'Lorsque vous vous mettez en pause, vous devenez inattaquable '.
'durant une durée déterminée mais en contrepartie vos ressources '.
'<br/>et celles de votre alliance n\'augmentent pas durant cette période.').
'
<br/><br/>
<b>'._('Entre 4 et 100 jours compris').'</b></p>

<form name="pause" method="post" action="#">
<b>'._('Nombre de jours').' :</b>
<input type="text"
       name="nbpause"
       maxlength="3" 
       size="3" />
<br/><br/>

<div class="bouton_classique"><input type="submit"
                                     value="'._('ok').'" 
                                     name="pause" 
                                     onclick="if (window.confirm(\''._('Valider la pause ?').'\')) { this.disabled=\'true\'; document.pause.submit();return false; } else { return false; }" /></div>
</form>
</div>';

?>