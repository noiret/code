﻿<?php
include 'fonction/functionBoutique.php';
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
		<li><a class="AdminGbandeau" href="Catalogue.php"><span>Insérer un produit</span></a><li>
		<li><a class="AdminGbandeau" href="ModifCatalogue.php"><span>Modifier un produit</span></a><li>
		<li><a class="AdminGbandeau" href="SuprCatalogue.php"><span>Suprimer un produit</span></a><li>
		<li><a class="AdminGbandeau" href="InsereCatalogue.php"><span>Insérer via CSV</span></a><li>
		<li><a class="AdminGbandeau" href="AjoutCatalogue.php"><span>Ajouter une catégorie</span></a><li>
	</ul>
	</div>
		<div class="textBandeau">
		
		<br/>&nbsp;
		Chossisez un produit a suprimer :<select name="listeBoutique" size="1">
		<option value="B1">P1</option>
		<option value="B2">P2</option>
		<option value="B3" selected="selected">P3</option>
		</select>
		
	
	</div>
	</div>

</body>
</html>