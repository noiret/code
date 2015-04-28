<?php
include 'fonction/functionBoutique.php';
base();
?>
	<div class="bandeauTitre">
	<div class="titre">
		Espace d'administration
		</div>
	</div>
<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
			
				<li class="menu_categorie"><a class="menuCatO" href="boutique.php">Boutique</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue.php">Catalogue</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="ModifMDP.php">Compte</a></li>
			</ul>
	</div>
		<div class="contenuBandeau">
	<div class="textBandeau">
			Changer votre mots de passe<br/><br/>
			Saisisez votre mots de passe actuelle:<br/> <input type="text" name="mdp"/><br/><br/>
			Nouveau mots de passe: <br/><input type="password" name="mdp"/><br/>
			<input class=Enregistrer type="submit" value="Enregistrer">
			</div>
	</div>
	</div>

</body>
</html>