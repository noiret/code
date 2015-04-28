<?php 
function base()
{
	echo'<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
	<link rel="icon" type="image/ico" href="../img/LogoPage2.ico">
	
	</head>
	<body>
	
	<div class="main">
	<div class="Menu_vertical">
	<img src="../img/Logo + titre.png" width="250" height="220" usemap="#carteMenu"/>
	<ul class="menu">
	<li><a class="menu" href="Index.php"><span>Accueil</span></a></li>
	<li><a class="menu" href="Boutique1.php"><span>Boutique</span></a></li>
	<li><a class="menu" href="Catalogue1.php"><span>Catalogue</span></a></li>
	<li><a class="menu" href="Connexion.php"><span>Connexion</span></a></li>
	</ul>
	</div>';
}
?>