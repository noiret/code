<?php
include 'fonction/functionBoutique.php';
base();
?>
<html>
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
		<div class="textBandeau">
		&nbsp;
		Adresse : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Code postale : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Ville : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Telephonie : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Horaires : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		<input class=Enregistrer type="submit" value="Enregistrer">
		</div>
	<div class="bandeauAdminGBoutique">
	<ul>
		<li><a class="AdminGbandeau" href="Boutique.php"><span>Ins�rer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="ModifBoutique.php"><span>Modifier une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="SuprBoutique.php"><span>Suprimer une boutique</span></a><li>
	</ul>
	</div>
	</div>
	</div>

</body>
</html>