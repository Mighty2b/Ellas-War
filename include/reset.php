<?php

echo '<h1>'._('Reset').'</h1>';

echo '<div class="ligne_80 rouge_goco centrer"><br/>'._(
'Attention en cas de confirmation votre compte sera remis à zéro de façon '.
'définitive. Cette action ne peut etre annulée.').
'<h3 class="cursor"
    onClick="if (window.confirm(\'Confirmer le reset de votre compte ?\')) { reset();return false; } else { return false; }" >'._('Recommencer une partie').'</h3>
</div>

<script type="text/javascript">
function reset() {
   $.ajax({
     type: "GET",
     url: "form/reset.php",
     success: function(msg){ lwindow.location.href=\''.SITE_URL.'\'; }
   });
}
</script>';

?>