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
		<li><a class="AdminGbandeau" href="Compte.php"><span>Consulter comptes</span></a><li>
		<li><a class="AdminGbandeau" href="CreeCompte.php"><span>Crée compte</span></a><li>
	</ul>
	</div>
		<div class="textBandeau">
		&nbsp;
		<!--  
		Identifiant : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		Mots de passe : <input class="question" type="text" id="txtNom" name="txtNom"/>
		<br/>&nbsp;
		<input class=Enregistrer type="submit" value="Enregistrer">
		</div>

	</div> -->
	</div>
	<?php 
	//AJOUT VIA FORMULAIRE
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		
 ?>

	  	<form id="f2" name="f2" method="POST" action="CreeCompte.php">
	  	<fieldset>
		<legend>Ajout d'une compte :</legend>
		
			Login compte : <input  type="text" id="LoginCompte" name="LoginCompte" required="required" /><br/>
			Mots de passe compte : <input  type="text" id="MdpCompte" name="MdpCompte" required="required" /><br/>
			Administrateur :    <input class="question" type="radio" id="StatutCompte" name="StatutCompte" value="1" checked="checked"/>Oui
				    			<input class="question" type="radio" id="StatutCompte" name="StatutCompte" value="0"/>Non<br/>
			Nom utilisateur : 	<input type="text" id="NomCompte" name ="NomCompte"  required="required" /> <br/>
			Prenom utilisateur :<input type="text" id="PrenomCompte" name ="PrenomCompte"  required="required" /> <br/>
			Boutique associé :  <input list="listeBoutique" type="number" id="BoutiqueAso" name ="BoutiqueAso"  required="required" placeholder="choissisez une boutique"/>
	    	<datalist id="listeBoutique" >
			<?php 
			$reponseBoutique= $bdd->prepare('SELECT distinct id FROM boutique');
			$reponseBoutique->execute();
			while($donnees = $reponseBoutique->fetch()) {
			echo '<option value="'.$donnees['id'].'">'.$donnees['id'].'</option>';
					}
			$reponseBoutique->closeCursor();

	}
	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
	?>
		</datalist>
		
			<br/><br/>
			<input name="bResetAjout" type="reset" value="effacer" />
			<input name="bEnvoieAjout" type="submit" value="valider" />
		</fieldset>
		</form>
	<?php 
	
	//INSERTION DANS LA BASE 
	
	if (isset($_POST['bEnvoieAjout']) && isset($_POST['LoginCompte']) && isset($_POST['MdpCompte']) && isset($_POST['StatutCompte']) && isset($_POST['NomCompte']) && isset($_POST['PrenomCompte']) && isset($_POST['BoutiqueAso']) ){
	$unLogin = htmlspecialchars($_POST['LoginCompte']);
	$unMDP = htmlspecialchars($_POST['MdpCompte']);
	$unStatut = $_POST['StatutCompte'];
	$unNom = htmlspecialchars($_POST['NomCompte']);
	$unPrenom = htmlspecialchars($_POST['PrenomCompte']);
	$uneBoutique = $_POST['BoutiqueAso'];
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO  compte (id,Login,mdpCompte,AdminG,nomUser,prenomUser,boutique_id) VALUES (\'\', :LOGIN,:MDP,:ADMING,:NOM,:PRENOM,:BOUTIQUE)');
	$enregistrement ->execute(array('LOGIN'=> $unLogin, 'MDP' => $unMDP , 'ADMING'=> $unStatut , 'NOM'=> $unNom, 'PRENOM'=> $unPrenom , 'BOUTIQUE'=> $uneBoutique ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> l\'utilisateur '.$unNom.' au login '.$unLogin.' a bien été enregistré avec l\'identifiant '.$GenID.'</h1>';
	echo'<script>location.href=\'Compte.php\';</script>';
	$enregistrement->closeCursor();
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }

	?>
</body>
</html>