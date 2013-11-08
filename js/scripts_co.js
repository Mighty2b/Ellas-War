$(function(){
  $("ul.dropdown li").hover(function(){
    $(this).addClass("hover");
    $('ul:first',this).css('visibility', 'visible');
  }, function(){
    $(this).removeClass("hover");
    $('ul:first',this).css('visibility', 'hidden');
  });
});

function deco() {
  $.ajax({
    type: "GET",
    url: "../form/form_deconnexion.php",
    success: function(msg) {
      location.reload();
    }
  });
}
