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
		&nbsp;<!--  
		Chossisez une boutique :<select name="listeBoutique" size="1">
		<option value="B1">B1</option>
		<option value="B2">B2</option>
		<option value="B3" selected="selected">B3</option>
		
		</select>
		<br/>
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
		</div> -->
		
		<?php creaTableauBoutique($base,$hote,$utilisateur,$mdp);?>
		
	<?php //AFFICHAGE DU FORMULAIRE DE MODIFICATION 
	
	if (isset($_GET['ModifBout']) ){
	$ModifierBout = ($_GET['ModifBout']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	
	$Modification = $bdd->prepare('SELECT * FROM boutique WHERE id = ?');
	
	$Modification ->execute(array($ModifierBout));
	while($donnees = $Modification->fetch()) {
	echo'
	<form class=mod id="f3" name="f3" method="POST" action="ModifBoutique.php">
	<fieldset>
	<legend>Mofication d\'une boutique :</legend>                                                       
	<input  type="hidden" id="idBout" name="idBout" value="'.$donnees['id'].'"/><br/>
	Rue : 	<input  type="text" id="RueBout" name="RueBout" value="'.$donnees['rue'].'"  required="required"/><br/>
	Code Postale :	<input type="number" id="CpBout" name="CpBout" value="'.$donnees['cp'].'" required="required"/><br/>
	Ville :	<input type="text" id="VilleBout" name="VilleBout" value="'.$donnees['ville'].'" required="required"/><br/>
	Image :	<input type="file" id="ImgBout" name="ImgBout" value="'.$donnees['image'].'" required="required"/><br/>
	Telephone :	<input type="number" id="TelBout" name="TelBout" value="'.$donnees['telephone'].'" required="required"/><br/>
	Horaire : 	<input  type="text" id="HoraireBout" name="HoraireBout" value="'.$donnees['horaires'].'"  required="required"/><br/>	';
	
			
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
																																										//PAS D'IMAGE
	if (isset($_POST['bEnvoieModif']) && isset($_POST['idBout']) && isset($_POST['RueBout']) && isset($_POST['CpBout']) && isset($_POST['VilleBout']) && isset($_POST['ImgBout']) && isset($_POST['TelBout']) && isset($_POST['HoraireBout']) ){
	$id = $_POST['idBout'];
	$Rue = htmlspecialchars($_POST['RueBout']);
	$Cp = htmlspecialchars($_POST['CpBout']);
	$Ville = $_POST['VilleBout'];
	$Img = $_POST['ImgBout'];
	$Tel = $_POST['TelBout'];
	$Horaires = $_POST['HoraireBout'];
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('UPDATE boutique SET rue=:uneRUE,cp=:unCP,ville=:uneVILLE,image=:uneIMAGE,telephone=:unTEL,horaires=:unHORAIRE WHERE id=:unid');
	$enregistrement ->execute(array('uneRUE'=> $Rue, 'unCP' => $Cp , 'uneVILLE'=> $Ville , 'uneIMAGE'=> $Img, 'unTEL'=> $Tel ,'unHORAIRE'=> $Horaires ,'unid'=>$id ));
	//echo '<h1 class="titreSite"> La boutique à '.$Ville.' a bien été modifié</h1>';
	echo '<script>alert(\'La boutique situé a '.$Ville.' a bien été modifié\');</script>';
	echo'<script>location.href=\'ModifBoutique.php\';</script>';
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