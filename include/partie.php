<?php

if(empty($_GET['var1']) or !is_int($_GET['var1'])) {
	redirect();
}

?>

<script type="text/javascript">
var current_partie=<?php echo $_GET['var1']; ?>;
var current_case;
var current_action;

$(document).ready(function() {
  current_action = '';
  $(".case").html("");
  $("#info_case_ext").hide();
  afficherPartie();
});

function afficherPartie() {

  $.getJSON(<?php echo API_URL; ?>,
           {action: "infopartie", token: localStorage.getItem('token'), partie: current_partie},
           function(data){
             if(data.token == '') {
              include('accueil');
             }
             else {
                var cases    = data.data.cases;
                var couleurs = data.data.couleurs;

                for(var i = 0; i < cases.length; i++) {
                  if(cases[i].membre_id > 0) {
                    if(cases[i].capitale == 1) {
                      $("#case_"+cases[i].x+"_"+cases[i].y).html("<div class=\"carre forme forme_"+couleurs[cases[i].membre_id]+"\"></div>");
                    }
                    else {
                      $("#case_"+cases[i].x+"_"+cases[i].y).html("<div class=\"cercle forme forme_"+couleurs[cases[i].membre_id]+"\" id=\"cercle_"+cases[i].x+"_"+cases[i].y+"\"></div>");
                    }
                    
                    if(data.data.moi == cases[i].membre_id) {
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
                  var case_co = $(this).attr("id").split('_');
                  $.getJSON(<?php echo API_URL; ?>,
                            {action: "possiblecase", token: localStorage.getItem('token'), 
                             partie: current_partie, x:case_co[1], y:case_co[2], distance:2},
                                 function(data) {
                                   $(".case_mernoire").removeClass('case_mernoire');
                                   for(var i = 0; i < data.data.length; i++) {
                                     $("#case_"+data.data[i]).addClass('case_mernoire');
                                   }
                                 }
                  );
                })
                .mouseup(function(){
                  $(".case_mernoire").removeClass('case_mernoire');
                });;
                
                $(".case_mer").droppable(
                 {accept: '.mesformes',
                   drop: function( event, ui ) {
                     var depart = current_case.split('_');
                     var arrive = $(this).attr("id").split('_');
                     if(current_case != $(this).attr("id")) {
                       $.getJSON(<?php echo API_URL; ?>,
                                 {action: "info_deplacement", token: localStorage.getItem('token'), partie: current_partie,
                                  depart_x:depart[1], depart_y:depart[2], 
                                  arrive_x:arrive[1], arrive_y:arrive[2]},
                                 function(data) {
                                   if(data.data.distance > 0) {
                                      var txt = '';
                                      
                                      txt += '<input type="hidden" id="move_departx" value="'+depart[1]+'" />';
                                      txt += '<input type="hidden" id="move_departy" value="'+depart[2]+'" />';
                                      
                                      if(data.data.bireme > 0) {
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.data.bireme     + ' 5 Attaque   6 Défense ';
                                        txt += '<br/><input id="move_bireme" name="move_bireme" type="text" value="'+data.data.bireme+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_bireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }
                                      
                                      if(data.data.trireme > 0) {
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.data.trireme    + ' 15 Attaque  22 Défense ';
                                        txt += '<br/><input id="move_trireme" name="achat_trireme" type="text" value="'+data.data.trireme+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_trireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }

                                      if(data.data.quadrireme > 0) { 
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.data.quadrireme + ' Quadrirème lourde  25 Attaque  10 Défense ';
                                        txt += '<br/><input id="move_quadrireme" name="achat_quadrireme" type="text" value="'+data.data.quadrireme+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_quadrireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }

                                      if(data.data.leviathan > 0) {
                                        txt += '<div class="ligne_achat">';
                                        txt += '<br/>' + data.data.leviathan  + ' Léviathan  45 Attaque  75 Défense ';
                                        txt += '<br/><input id="move_leviathan" name="achat_leviathan" type="text" value="'+data.data.leviathan+'" class="input_achat"/>';
                                        txt += '<div class="ext_slider"><div id="mover_leviathan" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                                        txt += '</div>';
                                      }
                                      
                                      current_case = 'deplacement';
                                      
                                      txt += '<div class="ligne_achat centrer">';
                                      txt += '<br/><input id="deplacement" type="button" name="Valider" value="Valider" onclick="deplacement('+arrive[1]+', '+arrive[2]+');" />';
                                      txt += '</div></div>';
                                      
                                      $("#info_case").html(txt);
                                      $("#info_case_ext").show();
                                      
                                      if(data.data.bireme > 0) {
                                        $('#mover_bireme').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.data.bireme,
                                          value: data.data.bireme,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_bireme').css('left', $('#mover_bireme').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                      
                                      if(data.data.trireme > 0) {
                                        $('#mover_trireme').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.data.trireme,
                                          value: data.data.trireme,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_trireme').css('left', $('#mover_trireme').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                      
                                      if(data.data.quadrireme > 0) {
                                        $('#mover_quadrireme').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.data.quadrireme,
                                          value: data.data.quadrireme,
                                        
                                          //Slider Event
                                          slide: function(event, ui) { //When the slider is sliding
                                            $('#move_quadrireme').css('left', $('#mover_quadrireme').slider('value')).val(ui.value);
                                          }
                                        });
                                      }
                                      
                                      if(data.data.leviathan > 0) {
                                        $('#mover_leviathan').slider({
                                          //Config
                                          range: "min",
                                          min: 0,
                                          max: data.data.leviathan,
                                          value: data.data.leviathan,
                                        
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
  );
}

function info_case(x, y) {
  $.getJSON(<?php echo API_URL; ?>,
       {action: "infocase", token: localStorage.getItem('token'), 
        partie:current_partie, x: x, y: y},
       function(data){
         if(data.data.membre_id == 0) {
           $("#info_case").html('<div class="centrer">Cette case est vide</div>');
           $("#info_case_ext").show();
         }
         else {
           if(data.data.proprio == 0) {
             $("#info_case").html('<div class="centrer">'+data.data.membre_login+'</div>');
             $("#info_case_ext").show();
           }
           else {
             var txt = '';
             if(data.data.capitale == 1) {
              txt += '<div class="ligne_achat">';
              txt += '<br/>' + data.data.bireme     + ' Birème  2 Or  5 Attaque   6 Défense ';
              
              if(data.gold >= 2) {
                var max_bireme = Math.floor(data.gold/2);
                txt += '<br/><input id="achat_bireme" name="achat_bireme" type="text" value="'+max_bireme+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_bireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider" onclick="engager(1)" /></div>';
              }
              
              txt += '</div><div class="ligne_achat">';
              txt += '<br/>' + data.data.trireme    + ' Trirème   5 Or  15 Attaque  22 Défense ';
              
              if(data.gold >= 5) {
                var max_trireme = Math.floor(data.gold/5);
                txt += '<br/><input id="achat_trireme" name="achat_trireme" type="text" value="'+max_trireme+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_trireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider" onclick="engager(2)" /></div>';
              }
              
              txt += '</div><div class="ligne_achat">';
              txt += '<br/>' + data.data.quadrireme + ' Quadrirème lourde   8 Or  25 Attaque  10 Défense ';
              
              if(data.gold >= 8) {
                var max_quadrireme = Math.floor(data.gold/8);
                txt += '<br/><input id="achat_quadrireme" name="achat_quadrireme" type="text" value="'+max_quadrireme+'" class="input_achat"/>';
                txt += '<div class="ext_slider"><div id="slider_quadrireme" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: 34.3434%;"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 34.3434%;"></a></div></div>';
                txt += '<div class="valide_slider"><input type="button" name="Valider" value="Valider"onclick="engager(3)"  /></div>';
              }
              
              txt += '</div><div class="ligne_achat">';
              txt += '<br/>' + data.data.leviathan  + ' Léviathan   20 Or   45 Attaque  75 Défense ';
              
              if(data.gold >= 20) {
                var max_leviathan = Math.floor(data.gold/20);
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
               txt += '<br/>Bireme : '     + data.data.bireme;
               txt += '<br/>Trireme : '    + data.data.trireme;
               txt += '<br/>Quadrireme : ' + data.data.quadrireme;
               txt += '<br/>Leviathan : '  + data.data.leviathan;
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
    $.getJSON(<?php echo API_URL; ?>,
         {action: "engager", token: localStorage.getItem('token'), 
          partie:current_partie, unite: unite, nb: nb},
         function(data){
           var case_id = current_case.split('_');
           info_case(case_id[1], case_id[2]);
         }
    );
  }
}

function deplacement(dest_x, dest_y) {
  $.getJSON(<?php echo API_URL; ?>,
       {action: "deplacement", token: localStorage.getItem('token'), 
        partie:current_partie, source_x:$("#move_departx").val(), source_y:$("#move_departy").val(),
        dest_x:dest_x, dest_y:dest_y, bireme: $("#move_bireme").val(),
        trireme:$("#move_trireme").val(), quadrireme:$("#move_quadrireme").val(),
        leviathan:$("#move_leviathan").val()},
       function(data){
         if(data.data == true) {
           $("#case_"+$("#move_departx").val()+"_"+$("#move_departy").val()).html('');
           afficherPartie();
           info_case(dest_x, dest_y);
         }
         else {
           info_case(source[1], source[2]);
         }
         deplacement = '';
       }
  );
}

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

$(document).keyup(function(e) {

  if(e.keyCode == 13 && current_case != '') {
  
    switch(current_case) {
      case 'deplacement':
        $("#deplacement").trigger("click");
      break;
    }
  }
  deplacement = '';
});

var taille = Math.floor($("#carte").width()/9);
$("#carte").height(((taille*9) + 36)+'px');
$("#carte").width(((taille*9) + 36)+'px');
$(".case").height(taille+'px');
$(".case").width(taille);
$("#info_case_ext").width((taille*9)+'px').css('margin-left', '18px');

</script>

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
