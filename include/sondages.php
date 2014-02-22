<?php

$sondages = $paquet->get_answer('info_sondages')->{1};
$rep      = $paquet->get_answer('info_sondages')->{2};
$tp = time();

foreach($sondages as $k => $sondage) {

	$options = $sondage->options;
		
	echo '<div class="ligne gauche">
	<div style="width:55%;position:relative;float:left;text-align:justify;">	
		<b>'.$sondage->question.'</b><br/>'.$sondage->texte.'<br/><br/>
	</div>';

	if($sondage->fin > $tp) {
		echo '<form method="post" action="#">
		<input type="hidden" name="sondage" value="'.$sondage->id.'" />
		<div style="position:relative;float:left;margin-left:20px;">';
		
		if($sondage->type == 0) {
			foreach($options as $j => $option) {
				echo '<input type="radio" 
				             name="reponse[]" 
				             value="'.$option->id_option.'" '.((!empty($rep->{$sondage->id}) && (in_array($option->id_option,$rep->{$sondage->id})))?' 
				             checked="checked"':'').'>'.$option->rep;
				echo '<br/>';
			}
		}
		else {
			foreach($options as $j => $option) {
				echo '<input type="checkbox" 
				             name="reponse[]" 
				             value="'.$option->id_option.'" '.((!empty($rep->{$sondage->id}) && (in_array($option->id_option,$rep->{$sondage->id})))?' 
				             checked="checked"':'').'>'.$option->rep;
				echo '<br/>';
			}
		}
		echo '<br/>
		<div class="bouton_classique"><input type="submit" name="envoyer" value="Envoyer"></div>
		</div>
		</form>';
	}
	else {
		//On affiche les résultats
		echo '<div style="position:relative;float:left;margin-left:20px;margin-top:12px;">
		<table class="none">';
		$rep = $sondage->rep;
		$total = 0;
		$reponse = array();
		foreach($rep as $j => $r) {
			$total += $r;
			$reponse[$j] = $r;
		}
		
		$i=1;
		foreach($options as $j => $option) {
			if(empty($reponse[$option->id_option])) {
				$reponse[$option->id_option] = 0;
			}
			echo '<tr>
							<td>'.$option->rep.'</td>
							<td><img src="images/sondage/'.$i.'.gif" alt="reponse" style="height:15px;width:'.round(100*$reponse[$option->id_option]/$total).'px;" /> '.round(100*$reponse[$option->id_option]/$total).'%';
				
					echo '</td>
						</tr>';
		  $i++;
		}
	
		echo '</table></div>';
	}
	echo '</div>';
}

?>