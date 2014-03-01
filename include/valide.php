<?php

$result = $paquet->get_answer('valide_winapass')->{1};

if(!($result)) {
    redirect('faveurerreur');
}

echo '<table align="center"
             class="centrer_tableau" 
             bgcolor="#e9bc7d" 
             bordercolor="#000000">
    <tr>
        <td>
        <div style="border:2px dotted black;padding:5px">
        	<span style="font-size:18px;font-weight:bolder;">
    <center>'._('Votre achat de <b>faveur</b> a bien été compté !').
		'<br><br>';
	
if($paquet->get_infoj('statu') == 2) {
	echo '<a href="/">'._('Retour').'</a>';
}
else {
	echo '<a href="obtenirdesfaveurs">'._('Retour').'</a>';
}

echo '</center>
        </span></div>
        </td>
    </tr>
</table>';

?>