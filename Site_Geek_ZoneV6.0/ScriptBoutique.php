<?php
function MenuVertical(){
	echo'<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<link rel="icon" type="image/ico" href="img/LogoPage2.ico">
	<title>Accueil Albertville</title>
	</head>
	<body><div class="main">
	<div class="Menu_vertical">
	<img src="img/Logo + titre.png" width="250" height="220" c/>
	<ul class="menu">
	<li><a class="menu" href="index.php"><span>Accueil</span></a></li>
	<li><a class="menu" href="Boutique1.php?bout=Albertville"><span>Boutique</span></a></li>
	<li><a class="menu" href="Catalogue1.php"><span>Catalogue</span></a></li>
	<li><a class="menu" href="Connexion.php"><span>Connexion</span></a></li>
	</ul>
	</div>';
}
function Connexion($id,$mdp){

}

	

function Tableau($id){
	
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
			 // Une ligne appelle les données de $donnees['']
			echo '<caption class="titreTableau">Fiche de renseignements :</caption>';
			
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Numero</td>';
			echo '<td height="100px" width="600px" class="TextTableauD">'.$donnees['id'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Adresse</td>';
			echo '<td height="100px" width="600px" class="TextTableauD">'.$donnees['rue'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Code postale</td>';
			echo '<td height="100px" width="600px" class="TextTableauD">'.$donnees['cp'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Ville</td>';
			echo '<td height="100px" width="600px" class="TextTableauD">'.$donnees['ville'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Photo</td>';
			echo '<td height="100px" width="600px" class="TextTableauD"><img src="img/images/boutiques/'.$donnees['image'].'"height="200px" width="200px"></td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Numero</td>';
			echo '<td height="100px" width="600px" class="TextTableauD">'.$donnees['telephone'].'</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td height="100px" width="600px" class="TextTableauG">Horaire </td>';
			echo '<td height="100px" width="600px" class="TextTableauD">'.$donnees['horaires'].'</td>';
			echo '</tr>';
		}
		echo '</table>'; // Fin du tableau
		
		// On libère la connexion du serveur pour d'autres requêtes :
		$reponse->closeCursor();
	}
	
	
	catch (Exception $erreur)
	{
		die('Erreur : ' . $erreur->getMessage());
	}
}
	?>
	 

