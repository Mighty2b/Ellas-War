<?php

function get_message($id=0, $args=array()) {
	
	$titre   = '';
	$message = '';

	switch ($id) {
		case 1:
			if(!empty($args) && !empty($args[0]->nom)) {
				$titre   = 'L\'alliance '.$args[0]->nom.' recrute';
				$message = 'Bonjour,

L\'alliance '.$args[0]->nom.' recrute des joueurs motivés. '.
'Si tu as des questions n\'hésite pas à répondre à ce message.
Le lien suivant permet de candidater pour nous rejoindre :
'.SITE_URL.'/postuler-'.$args[0]->id.'

Cordialement';
			}
		break;
		
		case 2:
				$message = 'Un de vos lots de '.$args['lot'].' '.imress($args['ress']).'
				           viennent d\'être achetés au débarras pour '.nbf($args['prix'], 3).
				           ' '.imress('drachme').'.';
		break;
	}
	
	return array('titre'   => $titre,
	             'message' => $message);
}

?>