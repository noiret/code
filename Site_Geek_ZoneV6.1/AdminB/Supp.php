<?php
include 'fonction/functionBoutique.php';
base();
?>
	<div class="bandeauTitre">
	<div class="titre">
		Espace d'administration
		</div>
	</div>
	<body>
<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
			
				<li class="menu_categorie"><a class="menuCatO" href="boutique.php">Boutique</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue.php">Catalogue</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="ModifMDP.php">Compte</a></li>
				
			</ul>
	</div>
<div class="contenuBandeau">
		<div class="bandeauAdminGBoutique">
	<ul>
		<li><a class="AdminGbandeau" href="InserBoutique.php"><span>Insérer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="ModifBoutique.php"><span>Modifier une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="Supp.php"><span>Suprimer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="InserCsv.php"><span>Insérer un CSV</span></a><li>
	</ul>
	</div>
	<div class="textBandeau">
			Choissisez un produit a supprimer<br/><br/>
			<input type="text" name="nom"/><br/><br/>
			<input class=Enregistrer type="submit" value="Enregistrer">
	</div>
	</div>
	</div>


</body>
</html>