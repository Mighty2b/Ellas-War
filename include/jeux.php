<?php

echo '
<br/><br/>
<table width="100%" class="none">
<tr>
	<td class="centrer"><a href="'._('carremagique').'"><img src="images/jeux/carre_150.png"
	                                                alt="'._('Carré magique').'" 
	                                                title="'._('Carré magique').'" /></a></td>

	<td class="centrer"><a href="'._('ticket').'"><img src="images/jeux/ticket_150.png" 
	                                                   alt="'._('Ticket à gratter').'" 
	                                                   title="'._('Ticket à gratter').'" /></a></td>';

	if($paquet->get_infoj('lvl') == 1) {
	  echo '</tr><tr>';
	}
	echo '
	<td class="centrer"><a href="#" 
	                       onclick="window.open(\'form/parcour.php\',\''._('Chasse aux trésors').'\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, copyhistory=0, menuBar=0, width=850, height=710\');" class="centre_armee"><img src="images/jeux/chasse_150.png" alt="'._('Chasse au trésor').'" title="'._('Chasse au trésor').'" /></a></td>';

	if($paquet->get_infoj('lvl') != 1) {
    echo '</tr>';
  }
  else {
    echo '	<td class="centrer"><a href="'._('loto').'"><img src="images/jeux/loto_150.png"
                                                    alt="'._('Loto').'" 
                                                    title="'._('Loto').'" /></a></td>
</tr>';
  }
  
	if($paquet->get_infoj('lvl') > 1) {
		echo '<tr><td colspan="3">&nbsp;</td></tr>
<tr>
	<td class="centrer"><a href="'._('javelot').'"><img src="images/jeux/javelot_150.png"
	                                           alt="'._('Javelot').'"
	                                           title="'._('Javelot').'" /></a></td>
	
	<td class="centrer"><a href="'._('des').'"><img src="images/jeux/des_150.png"
	                                                alt="'._('Jeux de dés').'" 
	                                                title="'._('Jeux de dés').'" /></a></td>
	
	<td class="centrer"><a href="'._('loto').'"><img src="images/jeux/loto_150.png"
	                                                 alt="'._('Loto').'"
	                                                 title="'._('Loto').'" /></a></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
	<td class="centrer"><a href="'._('bataillesnavales').'"><img src="images/jeux/btn_150.png"
	                                                             alt="'._('Batailles navales').'" 
	                                                             title="'._('Batailles navales').'" /></a></td>
	
	<td class="centrer"><a href="'._('biges').'"><img src="images/jeux/biges_150.png" 
	                                                  alt="'._('Biges').'" 
	                                                  title="'._('Biges').'" /></a></td>

	<td class="centrer"><a href="'._('quadriges').'"><img src="images/jeux/quadriges_150.png"
	                                                      alt="'._('Quadriges').'" 
	                                                      title="'._('Quadriges').'" /></a></td>
</tr>';
	}
echo '</table>';

?>