﻿<?php
include 'fonction/functionBoutique.php';
include 'param/id.php';
include 'fonction/tab.inc.php';
base();
?>
<html>
	<div>
	<div class="bandeauTitre">
	<div class="titre">
		Espace d'administration
		</div>
	</div>
	<body>
	<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
			
				<li class="menu_categorie"><a class="menuCatO" href="Boutique.php">Boutique</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue.php">Catalogue</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Compte.php">Compte</a></li>
				
			</ul>
	</div>
	<div class="contenuBandeau">
	<div class="bandeauAdminGBoutique">
	<ul>
		<li><a class="AdminGbandeau" href="Compte.php"><span>Consulter comptes</span></a><li>
		<li><a class="AdminGbandeau" href="CreeCompte.php"><span>Crée compte</span></a><li>
	</ul>
	</div>
		<div class="textBandeau">
		<!--  &nbsp;
		<table>

			<tr>
			 	<td>Identifiant</td>
				<td>Mot de passse</td>
			</tr>
			<tr>
			 	<td>Identifiant</td>
				<td>Mot de passse</td>
			</tr>
			<tr>
			 	<td>Identifiant</td>
				<td>Mot de passse</td>
			</tr>
			<tr>
			 	<td>Identifiant</td>
				<td>Mot de passse</td>
			</tr>
			<tr>
			 	<td>Identifiant</td>
				<td>Mot de passse</td>
			</tr>
			<tr>
			 	<td>Identifiant</td>
				<td>Mot de passse</td>
			</tr>
		
		
		
		</table>
		</div>
	-->
	<?php creaTableauCompte($base,$hote,$utilisateur,$mdp);?>
	</div>
	</div>

</body>
</html>