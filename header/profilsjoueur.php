<?php

if(empty($_GET['var1'])) {
	redirect();
}

if(!empty($_POST['pro_texte'])) {
	$paquet -> add_action('dedi_joueur',
	                      array($_GET['var1'], $_POST['pro_texte']));
}
elseif(!empty($_GET['var2'])) {
	if($_GET['var2'] == _('ajouter')) {
		$paquet -> add_action('ajouter_amis', array($_GET['var1']));
		redirect(_('amis'));
	}
	elseif($_GET['var2'] == _('ajouterl')) {
		$paquet -> add_action('ajouter_liste_noire',
													 array($_GET['var1'], $_GET['var3']));
	}
	elseif($_GET['var2'] == _('bloquer')) {
		$paquet -> add_action('bloquer_joueur', array($_GET['var1']));
	}
	elseif($_GET['var2'] == _('supprdedi') && !empty($_GET['var3']))	{
		$paquet -> add_action('supprimer_dedi', array($_GET['var1'], $_GET['var3']));
	}
}

$paquet -> add_action('profils_joueur', array($_GET['var1']));

echo '<title>'._('Profil').'</title>
	<meta name="description"
	      content="'._('Profil').'" />';

?>
