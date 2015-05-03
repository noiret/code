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
		<li><a class="AdminGbandeau" href="Boutique.php"><span>Insérer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="ModifBoutique.php"><span>Modifier une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="SuprBoutique.php"><span>Suprimer une boutique</span></a><li>
	</ul>
	</div>
		<div class="textBandeau">
		<?php
		try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		
 ?>

	  	<form id="f2" name="f2" method="POST" action="Boutique.php">
	  	<fieldset>
		<legend>Ajout d'une boutique :</legend>
		
			Rue : <input  type="text" id="rueBoutique" name="rueBoutique" required="required" /><br/>
			Code Postale :   <input type="number" id="CpBoutique" name="CpBoutique"  required="required"/><br/>
			Ville :    <input  type="text" id="VilleBoutique" name="VilleBoutique"  required="required"/> <br/>
			Image : 	<input type="file" id="ImgBoutique" name ="ImgBoutique"  required="required" /> <br/>
			Telephone :    <input class="question" type="number" id="TelBoutique" name="TelBoutique" /><br/>
			Horaires :   <input type="text" id="HoraireBoutique" name="HoraireBoutique"  required="required"/><br/>	    		
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
	
	//INSERTION DU STAGE DANS LA BASE BASESTAGE.SQL
	
	if (isset($_POST['bEnvoieAjout']) && isset($_POST['rueBoutique']) && isset($_POST['CpBoutique']) && isset($_POST['VilleBoutique']) && isset($_POST['ImgBoutique']) && isset($_POST['TelBoutique']) && isset($_POST['HoraireBoutique']) ){
	$Rue = htmlspecialchars($_POST['rueBoutique']);
	$Cp = $_POST['CpBoutique'];
	$Ville = htmlspecialchars($_POST['VilleBoutique']);
	$Img = $_POST['ImgBoutique'];
	$Tel = $_POST['TelBoutique'];
	$Horaire = htmlspecialchars($_POST['HoraireBoutique']);
	
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO boutique (id,rue,cp,ville,image,telephone,horaires) VALUES (\'\',:RUE,:CP,:VILLE,:IMAGE,:TELEPHONE,:HORAIRES)');
	$enregistrement ->execute(array('RUE'=> $Rue, 'CP' => $Cp , 'VILLE'=> $Ville , 'IMAGE'=> $Img, 'TELEPHONE'=> $Tel, 'HORAIRES'=> $Horaire ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> La boutique a '.$Ville.' a bien été enregistré avec l\'identifiant '.$GenID.'</h1>';
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