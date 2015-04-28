<?php
include 'fonction/functionBoutique.php';
base();
?>
	<div class="bandeauTitre">
	<div class="titre">
		Espace d'administration
		</div>
	</div>
	<body>
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
			Rue: <input type="text" name="nom"/><br/>
			Code postale: <input type="text" name="nom"/><br/>
			ville: <input type="text" name="nom"/><br/>
			Image boutique : <input class="question" type="file" id="image" name="image"/><br/>
			telephone: <input type="text" id="telephone" name="telephone"/><br/>
			Horaires: <input type="text" id="horaires" name="horaires"/><br/>
			<input class=Enregistrer type="submit" value="Enregistrer">
			</div>
	</div>
	<?php 
	
			if (isset($_POST['rue']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['image']) && isset($_POST['telephone']) && isset($_POST['horaires']) ){
				$rue = htmlspecialchars($_POST['rue']);
				$cp = htmlspecialchars($_POST['cp']);
				$ville = htmlspecialchars($_POST['ville']);
				$imgBoutique = $_POST['image'];
				$tel = htmlspecialchars($_POST['telephone']);
				$horaires = htmlspecialchars($_POST['horaires']);
			
			try{
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
				$modifB = $bdd->prepare('UPDATE boutique SET (id,rue,cp,ville,image,telephone,horaires) VALUES (\'\', :rue,:cp,:ville,:image,:telephone,:horaires)');
				$modifB ->execute(array('rue'=> $rue, 'cp' => $cp , 'ville'=> $ville , 'image'=> $imgBoutique, 'telephone'=> $tel, 'horaires'=>$horaires ));
				$GenID= $bdd->lastInsertId();
				echo '<h1 class="titreSite"> Le nouvelle boutique '.$rue.' '.$ville.' a bien été enregistré avec l\'identifiant '.$GenID.'</h1>';
				$enregistrement->closeCursor();
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