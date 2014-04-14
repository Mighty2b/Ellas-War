<?php

$stats = $paquet->get_infoj('stat');

echo '<h1>'._('Statistiques').'</h1>

<div class="ligne_80"><br/>
<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Victoires offensives').' :</span> '.
		$paquet->get_infoj('victoires').'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Victoires défensives').' :</span> '.
		$stats->vdef.'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Espionnages').' :</span> '.
		$stats->espion.'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Pactes signés').' :</span> '.
		$stats->signer.'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Prières').' :</span> '.
		$stats->priere.'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Poursuites').' :</span> '.
		$stats->poursuites.'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Missions').' :</span> '.
		$stats->missions.'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Quêtes').' :</span> '.
		$stats->quetes.'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Guerres déclarées').' :</span> '.
		$stats->declarer.'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Guerres gagnées').' :</span> '.
		$stats->gagner.'
	</div>
</div>

<div class="ligne">
	<div class="ligne_50">
		<span class="rouge_goco">'._('Batailles navales publiques gagnées').' :</span> '.
		$stats->btn_pub.'
	</div>
	<div class="ligne_50">
		<span class="rouge_goco">'._('Batailles navales privées gagnées').' :</span> '.
		$stats->btn_priv.'
	</div>
</div>
</div>';

?>