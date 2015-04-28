<?php
include 'fonction/functionBoutique.php';
include 'param/id.php';
base();
?>
<html>
<body>
	<div>
	<div class="bandeauTitre">
	<div class="titre">
		Espace d'administration
		</div>
	</div>
	
	<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
			
				<li class="menu_categorie"><a class="menuCatO" href="Boutique.php">Boutique</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue.php">Catalogue</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Compte.php">Compte</a></li>
				
			</ul>
	</div>
	<div class="contenuBandeau">
		
		&nbsp;
		
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
		Chossisez une boutique :<select name="listeBoutique" size="1">
		<?php 
		
		try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		// ici les traitements
		// Spécification de l'encodage (en cas de problème d'affichage :
		$bdd->exec('SET NAMES utf8');
		$reponse = $bdd->prepare('SELECT distinct ville FROM boutique');
		$reponse->execute( array() );
		while ($donnees = $reponse->fetch() )
		{
			echo '<option value="'.$donnees['ville'].'">'.$donnees['ville'].'</option>';
			}
		$reponse->closeCursor();
		}
		catch (Exception $erreur)
		{
			die('Erreur : ' . $erreur->getMessage());
		}
		?>
		
		</select>
		<input type="submit" value="Envoyer">
		<br/>&nbsp;
		Numéro produit : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Nom produit : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Description produit : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Détail produit : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Image produit : <input class="question" type="file" id="Img" name="Img"/>
		<br/>&nbsp;
		Catégorie produit : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		<input class=Enregistrer type="submit" value="Enregistrer">
		</div>
	
	</div>
	</div>

</body>
</html>
