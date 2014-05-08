/******************************************************************************
*                                                                             *
* jsDash - A Boulder Dash like in javascript                                  *
* Copyright (C) 2011  Fabien LOISON <http://software.flogisoft.com/jsdash>    *
*                                                                             *
* This program is free software: you can redistribute it and/or modify        *
* it under the terms of the GNU Affero General Public License as published by *
* the Free Software Foundation, either version 3 of the License, or           *
* (at your option) any later version.                                         *
*                                                                             *
* This program is distributed in the hope that it will be useful,             *
* but WITHOUT ANY WARRANTY; without even the implied warranty of              *
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               *
* GNU Affero General Public License for more details.                         *
*                                                                             *
* You should have received a copy of the GNU Affero General Public License    *
* along with this program.  If not, see <http://www.gnu.org/licenses/>.       *
*                                                                             *
******************************************************************************/

//Grid dimmentions
var ROWS = 30;
var COLS = 40;
var NUMB_LEVELS = 7;

//Sprites index
var SPRITES_SIZE = 20;
var SPRITES_TRANSLATION = {
	' ': "void",
	'.': "ground",
	'#': "wall",
	'O': "boulder",
	'V': "diamond",
	'P': "player",
	'X': "dead"
}
var SPRITES_TRANSLATION_INV = {
	'void': " ",
	'ground': ".",
	'wall': "#",
	'boulder': "O",
	'diamond': "V",
	'player': "P",
	'dead': "X"
}
var SPRITES = {
	'void': 0,
	'ground': 1,
	'wall': 2,
	'boulder': 3,
	'diamond': 4,
	'player': 5,
	'dead': 6
}

//The grid
var GRID = [];


//Game vars
var PLAYING = true;
var POS_X = 0;
var POS_Y = 0;
var NUM_DIAMONDS = 0;
var MOVES = 0;
var LEVEL = 1;
var UPDATED = false


//================================================================ GLOBAL ====

function init() {
	//Set the default value and clear all
	GRID = [];
	POS_Y = 0;
	POS_X = 0;
	MOVES = 0;
	NUM_DIAMONDS = 0;
	//Clear the html
	$("#jsdash").html("");
	//Add the toolbar
	$("#jsdash").append('<div class="jsdash_toolbar"><div style="width: '+ (COLS*SPRITES_SIZE) +'px;">Level: <span id="to_level">0</span> | Diamonds: <span id="to_diamonds">0</span> | Moves: <span id="to_moves">0</span></div></div>');
	//Let's go!
	$("#jsdash").append('<table style="width: '+ (COLS*SPRITES_SIZE+8) +'px; border: gray solid 4px">');
	for (y=0 ; y<ROWS ; y++) {
		GRID[y] = [];
		$("#jsdash table").append('<tr id="line'+y+'">');
		for (x=0 ; x<COLS ; x++) {
			GRID[y][x] = ' ';
			$("#jsdash #line"+y).append('<td id="cell'+y+'_'+x+'" style="background: url(../images/jeux/sprites.png) 0px 0px; width: '+SPRITES_SIZE+'px; height: '+SPRITES_SIZE+'px; line-height: '+SPRITES_SIZE+'px">&nbsp;</td>');
		}
		$("#jsdash table").append('</tr>');
	}
	$("#jsdash").append('</table>');
	//Add the toolbar
	$("#jsdash").append('<div class="jsdash_toolbar"><div style="width: '+ (COLS*SPRITES_SIZE) +'px;"><span id="retry" class="btn">Retry</span></div></div>');
	$("#retry").click(function() {PLAYING = false; play_level(LEVEL);});
	//Add events on the grid
	$("#jsdash td").click(function() {on_cell_clicked(this);});
}


function load_level(text) {
	init();
	var textlen = text.length;
	var i = 0;
	var y = 0;
	var x = 0;
	while (i < textlen && y < ROWS) {
		while (text[i] != '\n' && x < COLS) {
			if (text[i] != '\r') { //FIXME: problem for mac users...
				GRID[y][x] = text[i];
				$("#jsdash #cell"+y+"_"+x).css({'background-position': "-"+(SPRITES[SPRITES_TRANSLATION[text[i]]]*SPRITES_SIZE)+"px 0"});
				if (SPRITES_TRANSLATION[text[i]] == "player") {
					POS_X = x;
					POS_Y = y;
				} else if (SPRITES_TRANSLATION[text[i]] == "diamond") {
					NUM_DIAMONDS += 1;
				}
				x +=1
			}
			i += 1;
		}
		i += 1;
		x = 0;
		y += 1;
	}
	update_toolbar();
}


function get_item(x, y) {
	if (x >= 0 && x < COLS && y >= 0 && y < ROWS) {
		return SPRITES_TRANSLATION[GRID[y][x]];
	} else {
		return "outofmap";
	}
}


function set_item(x, y, item) {
	if (x >= 0 && x < COLS && y >= 0 && y < ROWS) {
		GRID[y][x] = SPRITES_TRANSLATION_INV[item];
		$("#jsdash #cell"+y+"_"+x).css({'background-position': "-"+(SPRITES[item]*SPRITES_SIZE)+"px 0"});
		return true;
	} else {
		return false;
	}
}


function move_player(x, y, x2, y2) {
	if (get_item(x, y) == "ground" || get_item(x, y) == "void") {
		set_item(POS_X, POS_Y, "void");
		set_item(x, y, "player");
		POS_X = x;
		POS_Y = y;
		MOVES += 1;
	} else if (get_item(x, y) == "diamond") {
		set_item(POS_X, POS_Y, "void");
		set_item(x, y, "player");
		POS_X = x;
		POS_Y = y;
		NUM_DIAMONDS -= 1;
		MOVES += 1;
		if (NUM_DIAMONDS <= 0) {
			PLAYING = false;
			alert("You Win !");
			next_level();
		}
	} else if (get_item(x, y) == "boulder") {
		if (get_item(x2, y2)  == "void" && y == y2) {
			set_item(POS_X, POS_Y, "void");
			set_item(x, y, "player");
			set_item(x2, y2, "boulder");
			POS_X = x;
			POS_Y = y;
			MOVES += 1;
		}
	}
	update_toolbar();
}


function checkEventObj(ev){
	//MSIE
	if (window.event)
		return window.event;
	//Others
	else
		return ev;
}


function on_key_press(ev) {
	if (!PLAYING) {
		return
	}

	var key = checkEventObj(ev).keyCode;
	var keychar = String.fromCharCode(ev.which);
	var intAltKey = checkEventObj(ev).altKey;
	var intCtrlKey = checkEventObj(ev).ctrlKey;

	//Down arrow
	if (key == 40) {
		move_player(POS_X, POS_Y+1, POS_X, POS_Y+2);;
	
	//Up arrow
	} else if (key == 38) {
		move_player(POS_X, POS_Y-1, POS_X, POS_Y-2);
		
	//Left arrow
	} else if (key == 37) {
		move_player(POS_X-1, POS_Y, POS_X-2, POS_Y);
	
	//Right arrow
	} else if (key == 39) {
		move_player(POS_X+1, POS_Y, POS_X+2, POS_Y);
	}
	return false;
}


function game_loop() {
	if (!PLAYING && (NUM_DIAMONDS == 0 && !UPDATED)) {
		return
	}
	UPDATED = false
	for (y=ROWS-1 ; y>=0 ; y--) {
		for (x=COLS-1 ; x>=0 ; x--) {
			if (get_item(x, y) == "boulder") {
				if (get_item(x, y+1) == "void") {
					set_item(x, y, "void");
					set_item(x, y+1, "boulder");
					if (get_item(x, y+2) == "player") {
						set_item(x, y+2, "dead");
						PLAYING = false;
						alert("Game Over");
						play_level(LEVEL);
					}
					UPDATED = true;
				} else if (get_item(x, y+1) == "boulder") {
					if (get_item(x-1, y) == "void" && get_item(x-1, y+1) == "void") {
						set_item(x, y, "void");
						set_item(x-1, y, "boulder");
						UPDATED = true;
					} else if (get_item(x+1, y) == "void" && get_item(x+1, y+1) == "void") {
						set_item(x, y, "void");
						set_item(x+1, y, "boulder");
						UPDATED = true;
					}
				}
			}
		}
	}
	setTimeout("game_loop();", 50);
}


function play_level(numb) {
	$.ajax({
		type: "GET",
		url: "../games/level/level_"+numb+".txt",
		cache: false,
		success: function(result) {
			load_level(result);
			PLAYING = true;
			game_loop();
		},
		error: function() {
			init();
			alert("Can't load the level "+numb+". Check your connexion.");
			PLAYING = false;
		}
	});
}


function update_toolbar() {
	$("#to_level").text(LEVEL);
	$("#to_diamonds").text(NUM_DIAMONDS);
	$("#to_moves").text(MOVES);
}


function next_level() {
	LEVEL += 1;
	if (LEVEL <= NUMB_LEVELS) {
		play_level(LEVEL);
	}
}


function on_cell_clicked(cell) {
	return false;
}


//Disable text selection and context menu
$(document).mousedown(function() {return true;});
$(document).bind("contextmenu", function() {return false;});
$(document).bind("keydown", function(ev){ on_key_press(ev); });

//Check if there is a selected level in the url
var level = document.location+"";
level = level.split('#')
if (!isNaN(level[1]) && level[1] <= NUMB_LEVELS) {
	LEVEL = parseInt(level[1]);
}

play_level(LEVEL);


