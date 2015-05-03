<?php
include 'fonction/functionBoutique.php';
include 'param/id.php';
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
		<?php 
	//AJOUT VIA FORMULAIRE
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		
 ?>

	  	<form id="f2" name="f2" method="POST" action="AjoutCatalogue.php">
	  	<fieldset>
		<legend>Ajout d'une catégorie :</legend>
		
			Nom categorie : <input  type="text" id="NomCat" name="NomCat" required="required" /><br/>
			
			<?php 
			}
	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
	?>
			<br/><br/>
			<input name="bResetAjout" type="reset" value="effacer" />
			<input name="bEnvoieAjout" type="submit" value="valider" />
		</fieldset>
		</form>
	<?php 
	
	//INSERTION DANS LA BASE 
	
	if (isset($_POST['bEnvoieAjout']) && isset($_POST['NomCat']) ){
	$NomCategorie = htmlspecialchars($_POST['NomCat']);	
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO  categorie (categorie_id,libelle) VALUES (\'\', :LIBELLE)');
	$enregistrement ->execute(array('LIBELLE'=> $NomCategorie ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> Votre categorie '.$NomCategorie.' a bien été enregistré avec l\'identifiant '.$GenID.'</h1>';
	$enregistrement->closeCursor();
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }

	?>
		</div>

	</div>
	</div>

</body>
</html>