<?php
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
		&nbsp;
	<?php creaTableauModif($base,$hote,$utilisateur,$mdp);?>
	<?php //AFFICHAGE DU FORMULAIRE DE MODIFICATION 
	
	if (isset($_GET['ModifProd']) ){
	$ModifierProd = ($_GET['ModifProd']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	
	$Modification = $bdd->prepare('SELECT * FROM produit WHERE produit_id = ?');
	
	$Modification ->execute(array($ModifierProd));
	while($donnees = $Modification->fetch()) {
	echo'
	<form class=modCat id="f3" name="f3" method="POST" action="ModifCatalogue.php">
	<fieldset class="mod">
	<legend>Mofication du produit :</legend>                                                       
	<input  type="hidden" id="id" name="id" value="'.$donnees['produit_id'].'"/>
	Nom du produit :<br/> 	<input  type="text" id="nom" name="nom" value="'.$donnees['nom'].'"  required="required"/><br/>
	Description :<br/>	<input type="text" id="Description" name="Description" value="'.$donnees['description'].'" required="required"/><br/>
	Detail :<br/>	<input type="text" id="detail" name="detail" value="'.$donnees['detail'].'" required="required"/><br/>
	Prix  :	<br/><input type="number" id="Prix" name="Prix" value="'.$donnees['prix'].'" required="required"/><br/>
	Image :<br/>	<input type="file" id="image" name="image" value="'.$donnees['image'].'" required="required"/><br/>
	Categorie :<br/>	<input type="text" id="categorie" name="categorie" value="'.$donnees['categorie'].'" required="required"/><br/>';
			
			echo'<br/><br/>
			<input name="bResetModif" type="reset" value="effacer" />
			<input name="bEnvoieModif" type="submit" value="valider" />
			</fieldset>
			</form>
			'; 
		}
	}
	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
	}
	
	?>
	<?php 
	
	if (isset($_POST['bEnvoieModif']) && isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['Description']) && isset($_POST['detail']) && isset($_POST['Prix']) && isset($_POST['image']) && isset($_POST['categorie']) ){
	$idProd = $_POST['id'];
	$NomProd = htmlspecialchars($_POST['nom']);
	$DescProd = htmlspecialchars($_POST['Description']);
	$DetailProd = $_POST['detail'];
	$PrixProd = $_POST['Prix'];
	$ImgProd = $_POST['image'];
	$CatProd = $_POST['categorie'];
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('UPDATE produit SET nom=:unNom,description=:uneDesc,detail=:unDetail,prix=:unPrix,image=:uneImage,categorie=:uneCat WHERE produit_id=:id');
	$enregistrement ->execute(array('unNom'=> $NomProd, 'uneDesc' => $DescProd , 'unDetail'=> $DetailProd , 'unPrix'=> $PrixProd, 'uneImage'=> $ImgProd ,'uneCat'=> $CatProd , 'id'=>$idProd ));
	//echo '<h1 class="titreSite"> Le produit '.$NomProd.' a bien été modifié</h1>';
	echo '<script>alert(\'Le produit '.$NomProd.' a bien été modifié\');</script>';
	echo'<script>location.href=\'ModifCatalogue.php\';</script>';
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
	</div>

</body>
</html>