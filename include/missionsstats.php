<?php

$stats = $paquet->get_infoj('stat');

echo '<h1>'._('Statistiques').'</h1>

<div class="ligne_80"><br/>
<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Victoires offensives').' :</span> '.
		nbf($paquet->get_infoj('victoires')).'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Victoires défensives').' :</span> '.
		nbf($stats->vdef).'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Espionnages').' :</span> '.
		nbf($stats->espion).'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Pactes signés').' :</span> '.
		nbf($stats->signer).'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Prières').' :</span> '.
		nbf($stats->priere).'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Poursuites').' :</span> '.
		nbf($stats->poursuites).'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Missions').' :</span> '.
		nbf($stats->missions).'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Quêtes').' :</span> '.
		nbf($stats->quetes).'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Guerres déclarées').' :</span> '.
		nbf($stats->declarer).'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Guerres gagnées').' :</span> '.
		nbf($stats->gagner).'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Batailles navales publiques gagnées').' :</span> '.
		nbf($stats->btn_pub).'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Batailles navales privées gagnées').' :</span> '.
		nbf($stats->btn_priv).'
	</div>
</div>
</div>';

?>