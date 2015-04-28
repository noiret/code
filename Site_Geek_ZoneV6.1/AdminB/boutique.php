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
			Fiche de renseignement<br/><br/>
			Adresse: <input type="text" id="rue" name="rue" required="required"/><br/>
			Code postale: <input type="text" id="cp" name="cp"required="required"/><br/>
			ville: <input type="text" id="ville" name="ville" required="required"/><br/>
			Telephone: <input type="text" id="telephone" name="telephone" required="required"/><br/>
			Horaires: <input type="text" id="horaires" name="horaires" required="required"/><br/>
			Image boutique : <input class="question" type="file" id="image" name="image"/><br/>
			<input class=Enregistrer type="submit" value="Enregistrer">
		</div>
	</div>
	
		<?php 
	
	if (isset($_POST['rue']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['telephone']) && isset($_POST['horaire']) && isset($_POST['image']) ){
	$rue = htmlspecialchars($_POST['rue']);
	$cp = htmlspecialchars($_POST['cp']);
	$ville = htmlspecialchars($_POST['ville']);
	$tel = htmlspecialchars($_POST['telephone']);
	$horaires = htmlspecialchars($_POST['horaires']);
	$image = $_POST['image'];
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	
	$modif = $bdd->prepare('UPDATE boutique SET rue=:rue,cp=:cp,ville=:ville,tel=:tel,horaires=:horaires,image=:image WHERE idPeople=:id');
	$modif ->execute(array('rue'=> $rue, 'cp' => $cp , 'ville'=> $ville , 'tel'=> $tel, 'horaires'=> $horaires , 'image'=> $image, 'id'=>$id ));
	echo '<h1 class="titreSite"> Le people '.$Nom.' '.$Prenom.' a bien été modifié</h1>';
	$modif->closeCursor();
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }
	?>
	</div>

</body>
</html>