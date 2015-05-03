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
		
		<?php creaTableauSupr($base,$hote,$utilisateur,$mdp);?>
	<?php 
	
	if (isset($_GET['supProd']) ){
	$SuppProd = ($_GET['supProd']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$suppresion = $bdd->prepare('DELETE FROM produit  WHERE produit_id=:id');
	$suppresion ->execute(array('id'=> $SuppProd));
	
	//echo '<h1 class="confirmation"> Le produit <i>numéro '.$SuppProd.' </i> a bien été supprimé ! </h1>';
	echo '<script>alert(\'Le produit numéro '.$SuppProd.' a bien été supprimé !\');</script>';
	echo'<script>location.href=\'SuprCatalogue.php\';</script>';
	//$enregistrement->closeCursor();
	}
	catch (Exception $erreurSup)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }
 
	?>	
	
	</div>
	</div>

</body>
</html>