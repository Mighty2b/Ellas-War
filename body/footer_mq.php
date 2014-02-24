<script type="text/javascript">
$(window).load(function() {
	if($(document).width() > $(window).width()) {
		var diff = ($(document).width() - $(window).width())/2;
		$('html,body').animate({
	        scrollLeft: diff
	    }, 1);
	}
});
<?php 

echo '
$("#banniere").click( function() {
	location.href = \''.SITE_URL.'\';
});';

?>
</script>