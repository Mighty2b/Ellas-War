<?php

include('../config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--***************************************************************************
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
****************************************************************************-->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

	<head>
		<title>jsDash</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="fr" />
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			html, body {
				margin: 0;
				padding: 0;
				background: black;
			}

			#jsdash {
				margin: 20px 0 0 0;
				overflow: auto;
			}

			#jsdash .jsdash_toolbar div {
				margin: 0 auto;
				padding: 4px;
				background: #eee;
				font-weight: bold;
				font-size: 12pt;
				font-family: "sans serif";
				text-align: center;
				/*border-radius: 5px 5px 0 0;
				-moz-border-radius: 5px 5px 0 0;
				-khtml-border-radius: 5px 5px 0 0;
				-webkit-border-radius: 5px 5px 0 0;*/
				width: 600px !important;
			}

			#jsdash .jsdash_toolbar .btn {
				border: black solid 1px;
				padding: 1px 5px;
				color: black;
				cursor: pointer;
			}

			#jsdash .jsdash_toolbar .btn:hover {
				background: black;
				color: white;
			}

			#jsdash table {
				margin: 0 auto;
				border-color: #eee !important;
				border-collapse: collapse;
			}

			#jsdash td {
				padding: 0;
				cursor: default;
			}
		</style>
	</head>

	<body>
		<div id="jsdash"></div>
		<script src="../js/jsdash.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>
