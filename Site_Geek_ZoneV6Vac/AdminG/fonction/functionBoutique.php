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
function Catalogue($id){

	include_once 'param/id.php';

	try
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		// ici les traitements
		// Spécification de l'encodage (en cas de problème d'affichage :
		$bdd->exec('SET NAMES utf8');
		$reponse = $bdd->query('SELECT * FROM boutique WHERE id = "'.$id.'"'); // Envoi de la requête
		$nb = $reponse->rowCount(); // Compte du nombre de lignes retournées
		echo '<table class="TableauBoutique" width="450px" height="10px" />'; // Déclaration d'un tableau

		while ( $donnees = $reponse->fetch() ) // Découpage ligne à ligne de $reponse
		{
		}
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' . $erreur->getMessage());
	}
}
?>