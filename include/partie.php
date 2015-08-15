<?php

$infopartie = $paquet->get_answer('infopartie');

if(!empty($infopartie->start) && $infopartie->start > $_SERVER['REQUEST_TIME']) {
	redirect();
}
?>

<script type="text/javascript">
var current_partie=<?php echo $_GET['var1']; ?>;
var current_case;
var current_action;
var capitale_x;
var capitale_y;

$(document).ready(function() {
  var taille = Math.floor($("#carte").width()/9);
  $("#carte").height(((taille*9) + 36)+'px');
  $("#carte").width(((taille*9) + 36)+'px');
  $(".case").height(taille+'px');
  $(".case").width(taille);
  
  current_action = '';
  $(".case").html("");
  $("#info_case_ext").hide();
  afficherPartie();
  
  $(".case_mer").click(function() {
    var case_id = $(this).attr("id").split('_');
    info_case(case_id[1], case_id[2]);
  }).mouseover(function() {
    current_case = $(this).attr("id");
  });

  $("#info_fermer").click(function() {

    current_case = '';
    $("#info_case").html('');
    $("#info_case_ext").hide();
    afficherPartie();
  });
});

function createCookie(name,value,days) {
  if (days) {
	  var date = new Date();
	  date.setTime(date.getTime()+(days*24*60*60*1000));
	  var expires = "; expires="+date.toGMTString();
  }
  else var expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
	  var c = ca[i];
	  while (c.charAt(0)==' ') c = c.substring(1,c.length);
	  if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function eraseCookie(name) {
  createCookie(name,"",-1);
}

function deplacement(dest_x, dest_y) {
  $.getJSON("<?php echo API_URL; ?>",
       {actions: {0:{action: "deplacement", para: {0: current_partie, 1:$("#move_departx").val(), 
        2:$("#move_departy").val(), 3:dest_x, 4:dest_y, 5: $("#move_bireme").val(),
        6:$("#move_trireme").val(), 7:$("#move_quadrireme").val(),
        8:$("#move_leviathan").val()}}}, 
        token: readCookie('token')},
       function(data){
         if(data.answer.deplacement == true) {
           $("#case_"+$("#move_departx").val()+"_"+$("#move_departy").val()).html('');
           afficherPartie();
           info_case(dest_x, dest_y);
         }
         else {
           info_case($("#move_departx").val(), $("#move_departy").val());
         }
         current_case = '';
       }
  );
}

function afficherPartie() {

  $.getJSON("<?php echo API_URL; ?>",
           {actions: {0:{action: "infopartie", para: {0: current_partie}}}, token: readCookie('token')},
           function(data){
           
             if(data != '') {
               if(data.answer.infopartie.vainqueur_id != 0) {
                   var txt_vain = '';
                   txt_vain += '<div class="ligne centrer rouge_goco">';
                   txt_vain += data.answer.infopartie.vainqueur_login;
                   txt_vain += ' a remporté la partie, la bataille navale est terminée.';
                   txt_vain += '</div>';
                   
                   $("#partie").html(txt_vain);
               }
               else {
                $("#btn_gold").html(data.answer.infopartie.gold+' <img src="images/ress/gold.png" title="Gold" alt="Gold" />');
                capitale_x = data.answer.infopartie.capitale_x;
                capitale_y = data.answer.infopartie.capitale_y;
                
                var cases    = data.answer.infopartie.cases;
                var couleurs = data.answer.infopartie.couleurs;
                for(var i = 0; i < cases.length; i++) {
                  if(cases[i].membre_id > 0) {
                    if(cases[i].capitale == 1) {
                      $("#case_"+cases[i].x+"_"+cases[i].y).html("<div class=\"carre forme forme_"+couleurs[cases[i].membre_id]+"\"></div>");
                    }
                    else {
                      $("#case_"+cases[i].x+"_"+cases[i].y).html("<div class=\"cercle forme forme_"+couleurs[cases[i].membre_id]+"\" id=\"cercle_"+cases[i].x+"_"+cases[i].y+"\"></div>");
                    }
                    
                    if(data.answer.infopartie.moi == cases[i].membre_id) {
                      $("#case_"+cases[i].x+"_"+cases[i].y).children('div').addClass('mesformes');
                    }
                  }
                }

                var taille = Math.floor($("#case_1_1").width()-20);
                
                $(".forme").height(Math.floor(taille*0.8)+'px');
                $(".forme").width(Math.floor(taille*0.8)+'px');
                $(".forme").css('margin', 'auto');
                $(".forme").css('margin-top', Math.floor((taille*0.2)/2+1)+'px');
                $(".mesformes").draggable({revert: "invalid",
                                           stop: function(){
                                               $(".case_mernoire").removeClass('case_mernoire');
                                           }})
                .mousedown(function(){
                  current_case = $(this).parents().attr("id");
                  var case_co = current_case.split('_');
                  $.getJSON("<?php echo API_URL; ?>",
                            {actions: {0:{action: "possiblecase", para: {0: current_partie, 1:case_co[1], 2:case_co[2]}}}, token: readCookie('token')},
                                 function(data) {
                                   $(".case_mernoire").removeClass('case_mernoire');
                                   for(var i = 0; i < data.answer.possiblecase.length; i++) {
                                     $("#case_"+data.answer.possiblecase[i]).addClass('case_mernoire');
                                   }
                                 }
                  );
                })
                .mouseup(function(){
                  $(".case_mernoire").removeClass('case_mernoire');
                });
                
                $(".case_mer").droppable(
                 {accept: '.mesformes',
                   drop: function( event, ui ) {
                     var depart = current_case.split('_');
                     var arrive = $(this).attr("id").split('_');
                     if(current_case != $(this).attr("id")) {
                       $.getJSON("<?php echo API_URL; ?>",
                                 {actions: {0:{action: "info_deplacement", para: {0: current_partie, 1:depart[1], 2:depart[2], 3:arrive[1], 4:arrive[2]}}}, token: readCookie('token')},
                                 function(data) {
                                   if(data.answer.info_deplacement.distance > 0) {
                                      var txt = '';
                                      
                                      txt += '<input type="hidden" id="move_departx" value="'+depart[1]+'" />';
                                      txt += '<input type="hidden" id="move_departy" value="'+depart[2]+'" />';
                                      
                                      if(data.answer.info_deplacement.bireme > 0) {
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.answer.info_deplacement.bireme + ' Birème';
                                        txt += ' 5 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
                                        txt += ' 6 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
                                        
                                        txt += '<br/><input id="move_bireme" name="move_bireme" type="text" value="'+data.answer.info_deplacement.bireme+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_bireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }
                                      
                                      if(data.answer.info_deplacement.trireme > 0) {
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.answer.info_deplacement.trireme + ' Trirème';
                                        txt += ' 15 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
                                        txt += ' 22 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
                                        txt += '<br/><input id="move_trireme" name="achat_trireme" type="text" value="'+data.answer.info_deplacement.trireme+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_trireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }

                                      if(data.answer.info_deplacement.quadrireme > 0) { 
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.answer.info_deplacement.quadrireme + ' Quadrirème lourde';
                                        txt += ' 25 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
                                        txt += ' 10 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
                                        txt += '<br/><input id="move_quadrireme" name="achat_quadrireme" type="text" value="'+data.answer.info_deplacement.quadrireme+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_quadrireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }

                                      if(data.answer.info_deplacement.leviathan > 0) {
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.answer.info_deplacement.leviathan  + ' Léviathan';
                                        txt += ' 45 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
                                        txt += ' 75 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
                                        txt += '<br/><input id="move_leviathan" name="achat_leviathan" type="text" value="'+data.answer.info_deplacement.leviathan+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_leviathan" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }
                                      
                                      current_case = 'deplacement';
                                      
                                      txt += '<div class="ligne_achat centrer">';
                                      txt += '<br/><input id="deplacement" type="button" name="Valider" value="Valider" onclick="deplacement('+arrive[1]+', '+arrive[2]+');" />';
                                      txt += '</div></div>';
                                      
                                      $("#info_case").html(txt);
                                      $("#info_case_ext").show();
                                      
                                      if(data.answer.info_deplacement.bireme > 0) {
                                        $('#mover_bireme').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.answer.info_deplacement.bireme,
                                          value: data.answer.info_deplacement.bireme,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_bireme').css('left', $('#mover_bireme').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                      
                                      if(data.answer.info_deplacement.trireme > 0) {
                                        $('#mover_trireme').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.answer.info_deplacement.trireme,
                                          value: data.answer.info_deplacement.trireme,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_trireme').css('left', $('#mover_trireme').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                      
                                      if(data.answer.info_deplacement.quadrireme > 0) {
                                        $('#mover_quadrireme').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.answer.info_deplacement.quadrireme,
                                          value: data.answer.info_deplacement.quadrireme,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_quadrireme').css('left', $('#mover_quadrireme').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                      
                                      if(data.answer.info_deplacement.leviathan > 0) {
                                        $('#mover_leviathan').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.answer.info_deplacement.leviathan,
                                          value: data.answer.info_deplacement.leviathan,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_leviathan').css('left', $('#mover_leviathan').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                   }
                                 }
                       );
                     }
                   }
                 });
               }
             }
           }
  );
}

function info_case(x, y) {
  $.getJSON("<?php echo API_URL; ?>",
       {actions: {0:{action: "infocase", para: {0: current_partie, 1:x, 2:y}}}, 
        token: readCookie('token')},
       function(data){
         if(data.answer.infocase.membre_id == 0) {
           $("#info_case").html('<div class="centrer"><br/>Cette case est vide<br/></div>');
           $("#info_case_ext").show();
         }
         else {
           if(data.answer.infocase.proprio == 0) {
             $("#info_case").html('<div class="centrer"><br/>'+data.answer.infocase.login+'<br/><br/></div>');
             $("#info_case_ext").show();
           }
           else {
             var txt = '';
             if(data.answer.infocase.capitale == 1) {
              //tourdef
              if(data.answer.infocase.tourdef > 0) {
                  txt += '<div class="ligne_achat">';
                  txt += '<br/>' + data.answer.infocase.tourdef     + ' Tours ';
                  txt += ' 0 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
                  txt += ' 250 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
                  txt += '</div>';
              }
              
              txt += '<div class="ligne_achat">';
              txt += '<br/>' + data.answer.infocase.bireme     + ' Birème  2 ';
              txt += '<img src="images/ress/gold.png" title="Gold" alt="Gold" />';
              txt += ' 5 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
              txt += ' 6 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
              
              if(data.answer.infocase.gold >= 2) {
                var max_bireme = Math.floor(data.answer.infocase.gold/2);
                txt += '<br/><input id="achat_bireme" name="achat_bireme" type="text" value="'+max_bireme+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_bireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider" onclick="engager(1)" /></div>';
              }
              
              txt += '</div><div class="ligne_achat">';
              txt += '<br/>' + data.answer.infocase.trireme    + ' Trirème   5 ';
              txt += '<img src="images/ress/gold.png" title="Gold" alt="Gold" />';
              txt += ' 15 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
              txt += ' 22 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
              
              if(data.answer.infocase.gold >= 5) {
                var max_trireme = Math.floor(data.answer.infocase.gold/5);
                txt += '<br/><input id="achat_trireme" name="achat_trireme" type="text" value="'+max_trireme+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_trireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider" onclick="engager(2)" /></div>';
              }
              
              txt += '</div><div class="ligne_achat">';
              txt += '<br/>' + data.answer.infocase.quadrireme + ' Quadrirème lourde   8 ';
              txt += '<img src="images/ress/gold.png" title="Gold" alt="Gold" />';
              txt += ' 25 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
              txt += ' 10 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
              
              if(data.answer.infocase.gold >= 8) {
                var max_quadrireme = Math.floor(data.answer.infocase.gold/8);
                txt += '<br/><input id="achat_quadrireme" name="achat_quadrireme" type="text" value="'+max_quadrireme+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_quadrireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider"onclick="engager(3)"  /></div>';
              }
              
              txt += '</div><div class="ligne_achat">';
              txt += '<br/>' + data.answer.infocase.leviathan  + ' Léviathan   20 ';
              txt += '<img src="images/ress/gold.png" title="Gold" alt="Gold" />';
              txt += ' 45 <img src="images/attaques/dague.png" title="Attaque" alt="Attaque" />';
              txt += ' 75 <img src="images/attaques/bouclier.png" title="Défense" alt="Défense" />';
              
              if(data.answer.infocase.gold >= 20) {
                var max_leviathan = Math.floor(data.answer.infocase.gold/20);
                txt += '<br/><input id="achat_leviathan" name="achat_leviathan" type="text" value="'+max_leviathan+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_leviathan" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider" onclick="engager(4)" /></div>';
              }
              
              txt += '<br/><br/></div>';
              
              $("#info_case").html(txt);
              $("#info_case_ext").show();
              
              $('#slider_bireme').slider({
                //Config
                range: "min",
                min: 1,
                max:max_bireme,
                value: max_bireme,
              
                //Slider Event
                slide: function(event, ui) { //When the slider is sliding
                  $('#achat_bireme').css('left', $('#slider_bireme').slider('value')).val(ui.value);
                }
              });
              $('#slider_trireme').slider({
                //Config
                range: "min",
                min: 1,
                max:max_trireme,
                value: max_trireme,
              
                //Slider Event
                slide: function(event, ui) { //When the slider is sliding
                  $('#achat_trireme').css('left', $('#slider_trireme').slider('value')).val(ui.value);
                }
              });
              $('#slider_quadrireme').slider({
                //Config
                range: "min",
                min: 1,
                max:max_quadrireme,
                value: max_quadrireme,
              
                //Slider Event
                slide: function(event, ui) { //When the slider is sliding
                  $('#achat_quadrireme').css('left', $('#slider_quadrireme').slider('value')).val(ui.value);
                }
              });
              $('#slider_leviathan').slider({
                //Config
                range: "min",
                min: 1,
                max:max_leviathan,
                value: max_leviathan,
              
                //Slider Event
                slide: function(event, ui) { //When the slider is sliding
                  $('#achat_leviathan').css('left', $('#slider_leviathan').slider('value')).val(ui.value);
                }
              });
             }
             else {
               txt += '<div class="centrer">';
               txt += '<br/>Bireme : '     + data.answer.infocase.bireme;
               txt += '<br/>Trireme : '    + data.answer.infocase.trireme;
               txt += '<br/>Quadrireme : ' + data.answer.infocase.quadrireme;
               txt += '<br/>Leviathan : '  + data.answer.infocase.leviathan;
               txt += '<br/><br/></div>';
               
               $("#info_case").html(txt); 
               $("#info_case_ext").show();
             }
           }
         }
       }
  );
}

function engager(unite) {
  var nb = 0;
  
  switch(unite) {
    case 1:
      nb = $("#achat_bireme").val();
    break;
    
    case 2:
      nb = $("#achat_trireme").val();
    break;
    
    case 3:
      nb = $("#achat_quadrireme").val();
    break;
    
    case 4:
      nb = $("#achat_leviathan").val();
    break;
  }

  if(nb > 0) {
    $.getJSON("<?php echo API_URL; ?>",
         {actions: {0:{action: "btn_engager", para: {0: current_partie, 1:unite, 2:nb}}}, 
          token: readCookie('token')},
         function(data){
           current_case = "case_"+capitale_x+"_"+capitale_y;
           info_case(capitale_x, capitale_y);
         }
    );
  }
}

$(document).keyup(function(e) {
  if(e.keyCode == 13 && current_case != '') {  
    switch(current_case) {
      case 'deplacement':
        $("#deplacement").trigger("click");
      break;
    }
  }
  current_case = '';
});
</script>
<div id="btn_liste"><a href="bataillesnavales">Retour aux batailles navales</a></div>
<div id="btn_gold"></div>
<div id="info_case_ext" style="display:none">
  <div id="info_fermer">
  Fermer
  </div>
  <div id="info_case">
  
  </div>
</div>
<div id="partie">
  <div id="carte">
    <div class="case case_terre" id="case_1_1"></div>
    <div class="case case_terre" id="case_2_1"></div>
    <div class="case case_terre" id="case_3_1"></div>
    <div class="case case_mer" id="case_4_1"></div>
    <div class="case case_mer" id="case_5_1"></div>
    <div class="case case_mer" id="case_6_1"></div>
    <div class="case case_terre" id="case_7_1"></div>
    <div class="case case_terre" id="case_8_1"></div>
    <div class="case case_terre" id="case_9_1"></div>
    
    <div class="case case_terre" id="case_1_2"></div>
    <div class="case case_terre" id="case_2_2"></div>
    <div class="case case_terre" id="case_3_2"></div>
    <div class="case case_mer" id="case_4_2"></div>
    <div class="case case_mer" id="case_5_2"></div>
    <div class="case case_mer" id="case_6_2"></div>
    <div class="case case_terre" id="case_7_2"></div>
    <div class="case case_terre" id="case_8_2"></div>
    <div class="case case_terre" id="case_9_2"></div>
    
    <div class="case case_terre" id="case_1_3"></div>
    <div class="case case_terre" id="case_2_3"></div>
    <div class="case case_terre" id="case_3_3"></div>
    <div class="case case_mer" id="case_4_3"></div>
    <div class="case case_mer" id="case_5_3"></div>
    <div class="case case_mer" id="case_6_3"></div>
    <div class="case case_terre" id="case_7_3"></div>
    <div class="case case_terre" id="case_8_3"></div>
    <div class="case case_terre" id="case_9_3"></div>
    
    <div class="case case_mer" id="case_1_4"></div>
    <div class="case case_mer" id="case_2_4"></div>
    <div class="case case_mer" id="case_3_4"></div>
    <div class="case case_mer" id="case_4_4"></div>
    <div class="case case_mer" id="case_5_4"></div>
    <div class="case case_mer" id="case_6_4"></div>
    <div class="case case_mer" id="case_7_4"></div>
    <div class="case case_mer" id="case_8_4"></div>
    <div class="case case_mer" id="case_9_4"></div>
    
    <div class="case case_mer" id="case_1_5"></div>
    <div class="case case_mer" id="case_2_5"></div>
    <div class="case case_mer" id="case_3_5"></div>
    <div class="case case_mer" id="case_4_5"></div>
    <div class="case case_mer" id="case_5_5"></div>
    <div class="case case_mer" id="case_6_5"></div>
    <div class="case case_mer" id="case_7_5"></div>
    <div class="case case_mer" id="case_8_5"></div>
    <div class="case case_mer" id="case_9_5"></div>
    
    <div class="case case_mer" id="case_1_6"></div>
    <div class="case case_mer" id="case_2_6"></div>
    <div class="case case_mer" id="case_3_6"></div>
    <div class="case case_mer" id="case_4_6"></div>
    <div class="case case_mer" id="case_5_6"></div>
    <div class="case case_mer" id="case_6_6"></div>
    <div class="case case_mer" id="case_7_6"></div>
    <div class="case case_mer" id="case_8_6"></div>
    <div class="case case_mer" id="case_9_6"></div>
    
    <div class="case case_terre" id="case_1_7"></div>
    <div class="case case_terre" id="case_2_7"></div>
    <div class="case case_terre" id="case_3_7"></div>
    <div class="case case_mer" id="case_4_7"></div>
    <div class="case case_mer" id="case_5_7"></div>
    <div class="case case_mer" id="case_6_7"></div>
    <div class="case case_terre" id="case_7_7"></div>
    <div class="case case_terre" id="case_8_7"></div>
    <div class="case case_terre" id="case_9_7"></div>
    
    <div class="case case_terre" id="case_1_8"></div>
    <div class="case case_terre" id="case_2_8"></div>
    <div class="case case_terre" id="case_3_8"></div>
    <div class="case case_mer" id="case_4_8"></div>
    <div class="case case_mer" id="case_5_8"></div>
    <div class="case case_mer" id="case_6_8"></div>
    <div class="case case_terre" id="case_7_8"></div>
    <div class="case case_terre" id="case_8_8"></div>
    <div class="case case_terre" id="case_9_8"></div>
    
    <div class="case case_terre" id="case_1_9"></div>
    <div class="case case_terre" id="case_2_9"></div>
    <div class="case case_terre" id="case_3_9"></div>
    <div class="case case_mer" id="case_4_9"></div>
    <div class="case case_mer" id="case_5_9"></div>
    <div class="case case_mer" id="case_6_9"></div>
    <div class="case case_terre" id="case_7_9"></div>
    <div class="case case_terre" id="case_8_9"></div>
    <div class="case case_terre" id="case_9_9"></div>
  </div>
</div>
<br/>