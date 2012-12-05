<div class="centrer">
<form action="#" method="post" name="formulaire">
	<b>Destinataire :</b> 
	<input type="text" name="destinataire" size="12" maxlength="30" class="form_retirer" <?php echo (!empty($rep_login)?'value="'.$rep_login.'"':''); ?> required="required"/>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<b>Sujet :</b> 
	<input name="titre_mp" class="form_retirer" <?php echo (!empty($rep->titre)?'value="'.$rep->titre.'"':''); ?> required="required"/><br/>
	
<p>
<input type="button" value="G" class="gras form_retirer" onclick="balise('texte', '<style:gras>', '</style>');" /> 
<input type="button" value="I" class="italique form_retirer" onclick="balise('texte', '<style:italique>', '</style>');" /> 
<input type="button" value="S" class="souligne form_retirer" onclick="balise('texte', '<style:souligne>', '</style>');" /> 
<input type="button" value="B" class="barre form_retirer" onclick="balise('texte', '<style:barre>', '</style>');" />
<input type="button" value="Citation" onclick="citation('texte');" class="form_retirer" /> 
<input type="button" value="Liste" onclick="liste('texte');" class="form_retirer" /> 
<input type="button" value="Lien" onclick="lien('texte');" class="form_retirer" /> 
<input type="button" value="Email" onclick="email('texte');" class="form_retirer" /> 
<input type="button" value="Image" onclick="image('texte');" class="form_retirer" />
<input type="button" value="Separation" onclick="balise('texte', '<separation>', '');" class="form_retirer" /> 
<input type="button" value="Suligné" onclick="balise('texte', '<style:suligne>', '</style>');" class="form_retirer" />
</p>
<p>
<input type="button" value="Surligné" onclick="balise('texte', '<style:surligne>', '</style>');" class="form_retirer" /> 
<input type="button" value="Encadre" onclick="balise('texte', '<style:encadre>', '</style>');" class="form_retirer" />

<select onchange="balise('texte', '<police:'+this.value+'>', '</police>'); this.options[0].selected = true;" class="form_retirer">
<option class="select_titre" selected="selected" disabled="disabled">Polices</option>
<option class="arial" value="arial">Arial</option>
<option class="times" value="times">Times New Roman</option>
<option class="courier" value="courier">Courier</option>
<option class="impact" value="impact">Impact</option>
<option class="verdana" value="verdana">Verdana</option>
</select> 
<select onchange="balise('texte', '<taille:'+this.value+'>', '</taille>'); this.options[0].selected = true;"  class="form_retirer">
<option class="select_titre" selected="selected" disabled="disabled">Tailles</option>
<option value="minuscule">Minuscule</option>
<option value="petit">Petit</option>
<option value="moyenpetit">Moyen petit</option>
<option value="moyengrand">Moyen grand</option>
<option value="grand">Grand</option>
<option value="enorme">Enorme</option>
</select> 
<select onchange="balise('texte', '<couleur:#'+this.value+'>', '</couleur>'); this.options[0].selected = true;"  class="form_retirer">
<option class="select_titre" selected="selected" disabled="disabled">Couleurs</option>
<option style="color: #ff00ff;" value="ff00ff">Rose</option>
<option style="color: #FFC0CB;" value="FFC0CB">Rose Claire</option>
<option style="color: #ff0000;" value="ff0000">Rouge</option>
<option style="color: #ec7600;" value="ec7600">Orange</option>
<option style="color: #ffff00;" value="ffff00">Jaune</option>
<option style="color: #00ff00;" value="00ff00">Vert clair</option>
<option style="color: #008000;" value="008000">Vert Foncé</option>
<option style="color: #808000;" value="808000">Olive</option>
<option style="color: #00ffff;" value="00ffff">Turquoise</option>
<option style="color: #008080;" value="008080">Bleu Gris</option>
<option style="color: #0000ff;" value="0000ff">Bleu</option>
<option style="color: #007FFF;" value="007FFF">Bleu Claire</option>
<option style="color: #000080;" value="000080">Bleu Marine</option>
<option style="color: #800080;" value="800080">Violet</option>
<option style="color: #ffffff;" value="ffffff">Blanc</option>
<option style="color: #c0c0c0;" value="c0c0c0">Argent</option>
<option style="color: #000000;" value="OOOOO0">Noir</option>
</select> 
<select onchange="balise('texte', '<aligner:'+this.value+'>', '</aligner>'); this.options[0].selected = true;"  class="form_retirer">
<option class="select_titre" selected="selected" disabled="disabled">Aligner</option>
<option value="gauche">Gauche</option>
<option value="centre">Centre</option>
<option value="droite">Droite</option>
<option value="justifie">Justifié</option>
</select> 
<select onchange="balise('texte', '<titre:'+this.value+'>', '</titre>'); this.options[0].selected = true;"  class="form_retirer">
<option class="select_titre" selected="selected" disabled="disabled">Titres</option>
<option value="1">Titre 1</option>
<option value="2">Titre 2</option>
</select> 
<br>
<a href="javascript:smile(':)', 'texte')"><img src="images/smiles/smile.png" alt=":)" title=":)"></a>
<a href="javascript:smile(':\'(', 'texte')"><img src="images/smiles/pleure.png" alt=":'("></a>
<a href="javascript:smile(':D', 'texte')"><img src="images/smiles/heureux.png" alt=":D"></a>
<a href="javascript:smile(':-O', 'texte')"><img src="images/smiles/huh.png" alt=":O"></a>
<a href="javascript:smile(':@', 'texte')"><img src="images/smiles/mechant.png" alt=":@"></a>
<a href="javascript:smile(':lol:', 'texte')"><img src="images/smiles/rire.gif" alt=":lol:"></a>
<a href="javascript:smile(':euh:', 'texte')"><img src="images/smiles/unsure.gif" alt=":euh:"></a>
<a href="javascript:smile('^^', 'texte')"><img src="images/smiles/hihi.png" alt="^^"></a>
<a href="javascript:smile(':p', 'texte')"><img src="images/smiles/langue.png" alt=":p"></a>
<a href="javascript:smile(':aware:', 'texte')"><img src="images/smiles/siffle.png" alt=":aware:"></a>
<a href="javascript:smile(';)', 'texte')"><img src="images/smiles/clin.png" alt=";)"></a>
<a href="javascript:smile(':(', 'texte')"><img src="images/smiles/triste.png" alt=":("></a>
<a href="javascript:smile('o_O', 'texte')"><img src="images/smiles/blink.gif" alt="o_O"></a>
<a href="javascript:smile(':ange:', 'texte')"><img src="images/smiles/ange.png" alt=":ange"></a>
<a href="javascript:smile('8)', 'texte')"><img src="images/smiles/soleil.png" alt="8)"></a>
<a href="javascript:smile('>_<', 'texte')"><img src="images/smiles/arf.gif" alt="&gt;_&lt;"></a>
<a href="javascript:smile(':bide:', 'texte')"><img src="images/smiles/bide.gif" alt=":bide:"></a>
<a href="javascript:smile(':chute:', 'texte')"><img src="images/smiles/chute.gif" alt=":chute:"></a>
<a href="javascript:smile(':s', 'texte')"><img src="images/smiles/confus.gif" alt=":s"></a>
<a href="javascript:smile(':music:', 'texte')"><img src="images/smiles/zicgood.gif" alt=":music:"></a>
<a href="javascript:smile(':ouin:', 'texte')"><img src="images/smiles/ouin.gif" alt="8)"></a>
</p>
	<textarea id="texte" name="contenu"  cols="50" rows="25" style="width:700px; height: 250px;" onclick="apercu(this.id, 'texte_apercu');" onkeyup="apercu(this.id, 'texte_apercu');"  class="form_retirer"><?php echo (!empty($rep->message)?$rep->message:''); ?></textarea><br/><br/>
	<div id="texte_apercu" class="apercu"></div>
	<br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="envoyer_un_mp" value="Envoyer" /></div>
</form>
</div>