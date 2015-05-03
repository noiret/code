<?php
include 'fonction/functionBoutique.php';
include 'param/id.php';
base();
?>
<html>
<body>
	
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
		Choisissez une boutique :<select name="listeBoutique" size="1">
		<?php 
		//Affichage de la ville 
		
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
		
		<form id="f1" name="f1" method="POST" action="Catalogue.php">
				
		<br/>&nbsp;
		Nom produit : <input class="question" type="text" id="NomProduit" name="NomProduit"/>
		<br/>&nbsp;
		Description produit : <input class="question" type="text" id="DescProduit" name="DescProduit"/>
		<br/>&nbsp;
		Détail produit : <input class="question" type="text" id="DetailProduit" name="DetailProduit"/>
		<br/>&nbsp;
		Prix produit : <input class="question" type="text" id="PrixProduit" name="PrixProduit"/>
		<br/>&nbsp;
		Image produit : <input class="question" type="file" id="ImgProduit" name="ImgProduit"/>
		<br/>&nbsp;
		Catégorie produit : <input list="CatProduit" class="question" type="text" id="Categorie" name="Categorie"/>
		<datalist id="CatProduit">
		<?php 
		//Affichage de la categorie produit
		try{
			$reponseCat= $bdd->prepare('SELECT distinct categorie FROM produit');
			$reponseCat->execute();
			while($donnees = $reponseCat->fetch()) {
			echo '<option value="'.$donnees['categorie'].'">'.$donnees['categorie'].'</option>';
					}
			$reponseCat->closeCursor();
			}
			catch (Exception $erreur)
			{
			die ('Erreur : '.$erreur->getMessage() );
			}
		?>
		</datalist>
		<br/>&nbsp;
		
		<input class="Enregistrer" type="submit" value="Enregistrer">
		
		</form>
		</div>
		
		<?php 
		//echo $_POST['NomProduit']."-".$_POST['DescProduit']."-" .$_POST['DetailProduit']. "-"  .$_POST['ImgProduit']. "-" .$_POST['PrixProduit']. "-" .$_POST['CatProduit'] ;
	if (isset($_POST['NomProduit']) && isset($_POST['DescProduit']) && isset($_POST['DetailProduit']) && isset($_POST['ImgProduit']) && isset($_POST['PrixProduit']) && isset($_POST['Categorie']) ){
	
	$NomProduit = htmlspecialchars($_POST['NomProduit']);
	$DescProduit = htmlspecialchars($_POST['DescProduit']);
	$DetailProduit = htmlspecialchars($_POST['DetailProduit']);
	$ImgProduit = $_POST['ImgProduit'];
	$Prix = htmlspecialchars($_POST['PrixProduit']);
	$CatProduit = htmlspecialchars($_POST['Categorie']);
	echo '<h1 class="titreSite"> Le produit x appellé '.$NomProduit.' a bien été enregistré </h1>';
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO produit (produit_id,nom,description,detail,prix,image,categorie) VALUES (\'\',:nomproduit,:descproduit,:detailproduit,:prixproduit,:imgproduit,:catproduit)');
	$enregistrement ->execute(array('nomproduit' => $NomProduit , 'descproduit'=> $DescProduit , 'detailproduit'=> $DetailProduit, 'prixproduit'=> $Prix, 'imgproduit'=> $ImgProduit, 'catproduit'=> $CatProduit ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> Le produit appellé '.$NomProduit.' a bien été enregistré </h1>';
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

</body>
</html>
