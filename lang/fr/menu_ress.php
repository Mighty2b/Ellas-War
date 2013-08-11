<?php

if(empty($ress_var)) {
	$ress_var = $paquet->get_ress_var();
}

if(empty($var_ress)) {
	$var_ress     = $paquet->get_ress();
}

echo '<img src="lang/fr/images/menu/titre_ress.png" 
					 alt="Ressources"
					 title="Ressources" />
		 
<script type="text/javascript">
  
function load() {
 
	b_ses = document.getElementById(\'block_drachme\');
	ses = '.$var_ress['drachme'].';
	conso_ses = '.($ress_var->drachme*3).';

	b_eau = document.getElementById(\'block_eau\');
	eau = '.$var_ress['eau'].';
	conso_eau = '.($ress_var->eau*3).';	
	
	b_fer = document.getElementById(\'block_fer\');
	fer = '.$var_ress['fer'].';
	conso_fer = '.($ress_var->fer*3).';		

	b_argent = document.getElementById(\'block_argent\');
	argent = '.$var_ress['argent'].';
	conso_argent = '.($ress_var->argent*3).';		
';	

	if($paquet->getlvl() >= $minimum_lvl_ress['gold'])
	{
		echo '
	b_gold = document.getElementById(\'block_gold\');
	gold = '.$var_ress['gold'].';
	conso_gold = '.($ress_var->gold*3).';';
	}
	
	echo '
	b_bois = document.getElementById(\'block_bois\');
	bois = '.$var_ress['bois'].';
	conso_bois = '.($ress_var->bois*3).';';	

	if($paquet->getlvl() >= $minimum_lvl_ress['pierre'])
	{
		echo '
		b_pierre = document.getElementById(\'block_pierre\');
		pierre = '.$var_ress['pierre'].';
		conso_pierre = '.($ress_var->pierre*3).';';
	}

	if($paquet->getlvl() >= $minimum_lvl_ress['marbre'])
	{
		echo '
	b_marbre = document.getElementById(\'block_marbre\');
	marbre = '.$var_ress['marbre'].';
	conso_marbre = '.($ress_var->marbre*3).';';
	}
	
	echo '
	b_nourriture = document.getElementById(\'block_nourriture\');
	nourriture = '.$var_ress['nourriture'].';
	conso_nourriture = '.($ress_var->nourriture*3).';';
	
	if($paquet->getlvl() >= $minimum_lvl_ress['raisin'])
	{
		echo '
		b_raisin = document.getElementById(\'block_raisin\');
		raisin = '.$var_ress['raisin'].';
		conso_raisin = '.($ress_var->raisin*3).';';
	}
	
	if($paquet->getlvl() >= $minimum_lvl_ress['vin'])
	{
		echo '
	b_vin = document.getElementById(\'block_vin\');
	vin = '.$var_ress['vin'].';
	conso_vin = '.($ress_var->vin*3).';';
	}
	
	echo '
	setTimeout(\'main1()\',1000);
	setTimeout(\'main2()\',2000);
	setTimeout(\'main3()\',3000);
}

function main1()
{
	ses = Math.floor(ses*100 + conso_ses * 100)/100;
	b_ses.innerHTML = (ses).toLocaleString();	
	bois = Math.round(bois*100 + conso_bois * 100)/100;	
	b_bois.innerHTML = (bois).toLocaleString();';

	if($paquet->getlvl() >= $minimum_lvl_ress['pierre'])
	{
		echo '
		pierre = Math.round(pierre*100 + conso_pierre * 100)/100;	
		b_pierre.innerHTML = (pierre).toLocaleString();';
	}
	
	if($paquet->getlvl() >= $minimum_lvl_ress['vin'])
	{
		echo '
	vin = Math.round(vin*100 + conso_vin * 100)/100;	
	b_vin.innerHTML = (vin).toLocaleString();';
	}
	echo '
	setTimeout(\'main1()\',3000);	
}

function main2()
{
	nourriture = Math.round(nourriture*100 + conso_nourriture * 100)/100;	
	b_nourriture.innerHTML = (nourriture).toLocaleString();
	fer = Math.round(fer*100 + conso_fer * 100)/100;	
	b_fer.innerHTML = (fer).toLocaleString();';
	
	if($paquet->getlvl() >= $minimum_lvl_ress['marbre'])
	{
		echo '
		marbre = Math.round(marbre*100 + conso_marbre * 100)/100;	
		b_marbre.innerHTML = (marbre).toLocaleString();';
	}
	
	if($paquet->getlvl() >= $minimum_lvl_ress['gold'])
	{
		echo '
	gold = Math.round(gold*100 + conso_gold * 100)/100;	
	b_gold.innerHTML = (gold).toLocaleString();';
	}
	echo '
	setTimeout(\'main2()\',3000);		
}

function main3()
{
	eau = Math.round(eau*100 + conso_eau * 100)/100;	
	b_eau.innerHTML = (eau).toLocaleString();
	argent = Math.round(argent*100 + conso_argent * 100)/100;	
	b_argent.innerHTML = (argent).toLocaleString();';
	
	if($paquet->getlvl() >= $minimum_lvl_ress['raisin'])
	{
		echo '
	raisin = Math.round(raisin*100 + conso_raisin * 100)/100;	
	b_raisin.innerHTML = (raisin).toLocaleString();';
	}
	
	echo '
	setTimeout(\'main3()\',3000);
}

</script>

<table id="tableau_ressources">
	<tr>
		<td>'.imress('drachme').'</td>
		<td id="block_drachme" 
		    class="droite '.($var_ress['drachme']<0?'red':'').'">'.number_format(round($var_ress['drachme'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->drachme).'</td>
	</tr>
	<tr>
		<td>'.imress('nourriture').'</td>
		<td id="block_nourriture" 
		    class="droite '.($var_ress['nourriture']<0?'red':'').'">'.number_format(round($var_ress['nourriture'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->nourriture).'</td>
	</tr>
	<tr>
		<td>'.imress('eau').'</td>
		<td id="block_eau" 
		    class="droite '.($var_ress['eau']<0?'red':'').'">'.number_format(round($var_ress['eau'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->eau).'</td>
	</tr>			
	<tr>
		<td>'.imress('bois').'</td>
		<td id="block_bois" 
		    class="droite '.($var_ress['bois']<0?'red':'').'">'.number_format(round($var_ress['bois'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->bois).'</td>
	</tr>
	<tr>
		<td>'.imress('fer').'</td>
		<td id="block_fer" 
		    class="droite '.($var_ress['fer']<0?'red':'').'">'.number_format(round($var_ress['fer'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->fer).'</td>
	</tr>
	<tr>
		<td>'.imress('argent').'</td>
		<td id="block_argent" 
		    class="droite '.($var_ress['argent']<0?'red':'').'">'.number_format(round($var_ress['argent'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->argent).'</td>
	</tr>';

	if($paquet->getlvl() >= $minimum_lvl_ress['pierre']) {
	echo '
	<tr>
		<td>'.imress('pierre').'</td>
		<td id="block_pierre" 
		    class="droite '.($var_ress['pierre']<0?'red':'').'">'.number_format(round($var_ress['pierre'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->pierre).'</td>
	</tr>';
	}
	
	if($paquet->getlvl() >= $minimum_lvl_ress['marbre'])
	{
	echo '<tr>
		<td>'.imress('marbre').'</td>
		<td id="block_marbre" 
		    class="droite '.($var_ress['marbre']<0?'red':'').'">'.number_format(round($var_ress['marbre'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->marbre).'</td>
	</tr>';
	}

	if($paquet->getlvl() >= $minimum_lvl_ress['raisin'])
	{
	echo '
	<tr>
		<td>'.imress('raisin').'</td>
		<td id="block_raisin" 
		    class="droite '.($var_ress['raisin']<0?'red':'').'">'.number_format(round($var_ress['raisin'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->raisin).'</td>
	</tr>';
	}

	if($paquet->getlvl() >= $minimum_lvl_ress['vin'])	{
		echo '
	<tr>
		<td>'.imress('vin').'</td>
		<td id="block_vin" 
		    class="droite '.($var_ress['vin']<0?'red':'').'">'.number_format(round($var_ress['vin'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->vin).'</td>
	</tr>';
	}
	
	if($paquet->getlvl() >= $minimum_lvl_ress['gold'])
	{
	echo '
	<tr>
		<td>'.imress('or').'</td>
		<td id="block_gold" 
		    class="droite '.($var_ress['gold']<0?'red':'').'">'.number_format(round($var_ress['gold'],2), 2, ',', ' ').'</td>
		<td>'.statu_ress($ress_var->gold).'</td>
	</tr>';
	}
	
	echo '
	<tr>
		<td>'.imress('faveur').'</td>
		<td class="droite">'.nbf($paquet->getFaveurs()).'</td>
		<td></td>
	</tr>';
	
	if($paquet->is_event('stv')) {
		echo '
		<tr>
		<td>'.imress('stv').'</td>
		<td class="droite">'.nbf($paquet->getMonnaie()).'</td>
		<td></td>
		</tr>';
	}
	
echo '
</table>

<a href="Details" class="details_ress">Détails</a>';

?>