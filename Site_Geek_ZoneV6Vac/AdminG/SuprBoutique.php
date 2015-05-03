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
		<li><a class="AdminGbandeau" href="Boutique.php"><span>Insérer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="ModifBoutique.php"><span>Modifier une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="SuprBoutique.php"><span>Suprimer une boutique</span></a><li>
	</ul>
	</div>
		<div class="textBandeau">
		<!--  &nbsp;
		Chossisez une boutique a suprimer :<select name="listeBoutique" size="1">
		<option value="B1">B1</option>
		<option value="B2">B2</option>
		<option value="B3" selected="selected">B3</option>
		
		</select>
	
		<br/>&nbsp;
		<input class=Enregistrer type="submit" value="Enregistrer">
		</div>
	-->
	<?php creaTableauBoutSupr($base,$hote,$utilisateur,$mdp);?>
	<?php 
	
	if (isset($_GET['supBout']) ){
	$SuppBoutique = ($_GET['supBout']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$suppresion = $bdd->prepare('DELETE FROM boutique  WHERE id=:id');
	$suppresion ->execute(array('id'=> $SuppBoutique));
	
	//echo '<h1 class="confirmation"> La boutique<i>numéro '.$SuppBoutique.' </i> a bien été supprimé ! </h1>';
	echo '<script>alert(\'La boutique numero '.$SuppBoutique.' a bien été suprimé\');</script>';
	echo'<script>location.href=\'SuprBoutique.php\';</script>';
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