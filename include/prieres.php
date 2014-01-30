<?php

echo '<h1>'._('Prières').'</h1>';

$paquet->error('prier');

echo '
<div class="centrer ligne">
<br/><b>'._(
'Vénérez les dieux et vos prières seront peut-être écoutées.').'</b>

<form action="#" method="POST">
	<input name="message"
	       type="text" 
	       size="75" /><br/><br/>
	<div class="bouton_classique"><input type="submit" 
	                                     value="'._('Valider').'" /></div>
</form>

</div>';

?>