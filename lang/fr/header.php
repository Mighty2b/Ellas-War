<?php

echo '<marquee behavior="scroll"
							 direction="left" 
							 height="18" 
							 scrollamount="3" 
							 scrolldelay="0"
							 onmouseover="this.stop()" 
							 onmouseout="this.start()" 
							 style="width:740px;position:relative;margin-top:40px;">'.$var_missives.'</marquee>';

echo '<img src="lang/fr/design/deconnexion.png" 
					 style="margin-top:-5px;margin-left:26px;position:relative;z-index:1000;"
					 alt="Deconnexion"
					 title="Deconnexion"
					 class="supr_messagerie"
					 id="bouton_deconnexion"/><br/>
<div id="bouton_missive">
	<a href="Missives" class="bouton_missives">Missives</a>
</div>';

if($paquet-> getlvl() <= 5) {
	echo '<div id="mp">';
	include('lang/'.LANG.'/include/texte_mp.php');
	echo '</div>';
}

switch($paquet-> getlvl()) {
	case 0:
	case 1:
		echo '<div id="etape">';
			include('lang/'.LANG.'/include/texte_tuto.php');
		echo '</div>';
	break;
	
	default:
	
	break;
}
/*
echo '<div id="evenement" class="centrer">
<a href="Sanctuaires" class="rouge_goco"><b>Événement en cours</b>
<br/>Le sanctuaire du Staff</a><br/><br/>
<a href="Evenements" class="gras">En savoir plus</a>
</div>';*/

?>