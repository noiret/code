<?php
include 'param/id.php';
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
		<div class="bandeauAdminGBoutique">
	<ul>
		<li><a class="AdminGbandeau" href="InserBoutique.php"><span>Insérer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="ModifBoutique.php"><span>Modifier une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="Supp.php"><span>Suprimer une boutique</span></a><li>
		<li><a class="AdminGbandeau" href="InserCsv.php"><span>Insérer un CSV</span></a><li>
	</ul>
	</div>
	<div class="textBandeau">
	<form id="form1" name="form1" method="POST" action="InserBoutique.php">
			Rue: <input type="text" id="rue" name="rue"/><br/>
			Code Postale: <input type="text" id="cp" name="cp"/><br/>
			ville: <input type="text" id="ville" name="ville"/><br/>
			Image boutique : <input class="question" type="file" id="image" name="image"/><br/>
			telephone: <input type="text" id="telephone" name="telephone"/><br/>
			Horaires: <input type="text" id="horaires" name="horaires"/><br/>
			<input class=Enregistrer type="submit" name="boutSub" id="boutSub" value="Enregistrer"/>
			</form>
<?php 
	
			if (isset($_POST['rue']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_FILES['image']) && isset($_POST['telephone']) && isset($_POST['horaires']) ){
				$rue = htmlspecialchars($_POST['rue']);
				$cp = htmlspecialchars($_POST['cp']);
				$ville = htmlspecialchars($_POST['ville']);
				$imgBoutique = $_FILE['image'];
				$tel = htmlspecialchars($_POST['telephone']);
				$horaires = htmlspecialchars($_POST['horaires']);
			
			try{
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
				$enregistrement = $bdd->prepare('INSERT INTO boutique (id,rue,cp,ville,image,telephone,horaires) VALUES (\'\', :rue,:cp,:ville,:image,:telephone,:horaires)');
				$enregistrement ->execute(array('rue'=> $rue, 'cp' => $cp , 'ville'=> $ville , 'image'=> $imgBoutique, 'telephone'=> $tel, 'horaires'=>$horaires ));
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
	</div>
	</div>

</body>
</html>