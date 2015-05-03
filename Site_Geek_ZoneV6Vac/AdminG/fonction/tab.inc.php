<?php
function creaTableauModif ($base,$hote,$utilisateur,$mdp){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);


		$reponse = $bdd->prepare('SELECT * FROM produit');
			
		$reponse->execute();
			
		$nbLignes = $reponse->rowCount();
			//EN TETE TABLEAU
		echo '<table class="FormeTab" width="500px" height="300px">';
		echo '<thead>';
		echo '<tr>';
		echo'<th class="EnTeteTab">Numero Produit</th>';
		echo'<th class="EnTeteTab">Nom Produit</th>';
		//echo'<th class="EnTeteTab">Desciption</th>';
		//echo'<th class="EnTeteTab">Detail</th>';
		echo'<th class="EnTeteTab">Prix</th>';
		//echo'<th class="EnTeteTab">Image</th>';
		echo'<th class="EnTeteTab">Categorie</th>';
		echo'<th class="EnTeteTab">Modifier</th>';
		echo '</tr>';
		echo '</thead>';
		while ( $donnees = $reponse->fetch()) {
			//CONTENU A AFFICHER PAR LIGNE
			echo '<tr>';
			echo '<td class="Tableau">'.$donnees['produit_id'].'</td>';
			echo '<td class="Tableau">'.$donnees['nom'].'</td>';
			//echo '<td class="Tableau">'.$donnees['description'].'</td>';
			//echo '<td class="Tableau">'.$donnees['detail'].'</td>';
			echo '<td class="Tableau">'.$donnees['prix'].'</td>';
			//echo '<td class="Tableau">'.$donnees['image'].'</td>';
			echo '<td class="Tableau">'.$donnees['categorie'].'</td>';
			echo '<td class="Tableau">
			<a href="ModifCatalogue.php?ModifProd='.$donnees['produit_id'].'"><img src="Images/modifier.png" /></a></td>';
			echo '</tr>';
			
		}
		echo '</table>';
		//echo '<h4 class=resultat>Il ya '.$nbLignes.' résultats ';
	}

	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
}
?>
<?php
function creaTableauSupr ($base,$hote,$utilisateur,$mdp){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);


		$reponse = $bdd->prepare('SELECT * FROM produit');
			
		$reponse->execute();
			
		$nbLignes = $reponse->rowCount();
			//EN TETE TABLEAU
		echo '<table class="FormeTab" width="500px" height="300px">';
		echo '<thead>';
		echo '<tr>';
		echo'<th class="EnTeteTab">Numero Produit</th>';
		echo'<th class="EnTeteTab">Nom Produit</th>';
		//echo'<th class="EnTeteTab">Desciption</th>';
		//echo'<th class="EnTeteTab">Detail</th>';
		echo'<th class="EnTeteTab">Prix</th>';
		//echo'<th class="EnTeteTab">Image</th>';
		echo'<th class="EnTeteTab">Categorie</th>';
		echo'<th class="EnTeteTab">Modifier</th>';
		echo '</tr>';
		echo '</thead>';
		while ( $donnees = $reponse->fetch()) {
			//CONTENU A AFFICHER PAR LIGNE
			echo '<tr>';
			echo '<td class="Tableau">'.$donnees['produit_id'].'</td>';
			echo '<td class="Tableau">'.$donnees['nom'].'</td>';
			//echo '<td class="Tableau">'.$donnees['description'].'</td>';
			//echo '<td class="Tableau">'.$donnees['detail'].'</td>';
			echo '<td class="Tableau">'.$donnees['prix'].'</td>';
			//echo '<td class="Tableau">'.$donnees['image'].'</td>';
			echo '<td class="Tableau">'.$donnees['categorie'].'</td>';

			echo '<td class="Tableau">
			<a href="SuprCatalogue.php?supProd='.$donnees['produit_id'].'">
			<img src="Images/supprimer.png" /></a></td>';
			
		}
		echo '</table>';
		//echo '<h4 class=resultat>Il ya '.$nbLignes.' résultats ';
	}

	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
}
?>
<?php
function creaTableauBoutique ($base,$hote,$utilisateur,$mdp){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);


		$reponse = $bdd->prepare('SELECT * FROM boutique');
			
		$reponse->execute();
			
		$nbLignes = $reponse->rowCount();
			//EN TETE TABLEAU
		echo '<table class="FormeTab" width="600px" height="400px">';
		echo '<thead>';
		echo '<tr>';
		echo'<th class="EnTeteTab">Numero boutique</th>';
		echo'<th class="EnTeteTab">Rue</th>';
		echo'<th class="EnTeteTab">Code Postale</th>';
		echo'<th class="EnTeteTab">Ville</th>';
		//echo'<th class="EnTeteTab">image</th>';
		echo'<th class="EnTeteTab">Telephone</th>';
		echo'<th class="EnTeteTab">Horaire</th>';
		echo'<th class="EnTeteTab">Modifier</th>';
		echo '</tr>';
		echo '</thead>';
		while ( $donnees = $reponse->fetch()) {
			//CONTENU A AFFICHER PAR LIGNE
			echo '<tr>';
			echo '<td class="Tableau">'.$donnees['id'].'</td>';
			echo '<td class="Tableau">'.$donnees['rue'].'</td>';
			echo '<td class="Tableau">'.$donnees['cp'].'</td>';
			echo '<td class="Tableau">'.$donnees['ville'].'</td>';
			//echo '<td class="Tableau">'.$donnees['image'].'</td>';
			echo '<td class="Tableau">'.$donnees['telephone'].'</td>';
			echo '<td class="Tableau">'.$donnees['horaires'].'</td>';
			echo '<td class="Tableau">
			<a href="ModifBoutique.php?ModifBout='.$donnees['id'].'"><img src="Images/modifier.png" /></a></td>';
			echo '</tr>';
			
		}
		echo '</table>';
		//echo '<h4 class=resultat>Il ya '.$nbLignes.' résultats ';
	}

	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
}
?>
<?php
function creaTableauBoutSupr ($base,$hote,$utilisateur,$mdp){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);


		$reponse = $bdd->prepare('SELECT * FROM boutique');
			
		$reponse->execute();
			
		$nbLignes = $reponse->rowCount();
			//EN TETE TABLEAU
		echo '<table class="FormeTab" width="600px" height="400px">';
		echo '<thead>';
		echo '<tr>';
		echo'<th class="EnTeteTab">Numero boutique</th>';
		echo'<th class="EnTeteTab">Rue</th>';
		echo'<th class="EnTeteTab">Code Postale</th>';
		echo'<th class="EnTeteTab">Ville</th>';
		//echo'<th class="EnTeteTab">image</th>';
		echo'<th class="EnTeteTab">Telephone</th>';
		echo'<th class="EnTeteTab">Horaire</th>';
		echo'<th class="EnTeteTab">Suprimer</th>';
		echo '</tr>';
		echo '</thead>';
		while ( $donnees = $reponse->fetch()) {
			//CONTENU A AFFICHER PAR LIGNE
			echo '<tr>';
			echo '<td class="Tableau">'.$donnees['id'].'</td>';
			echo '<td class="Tableau">'.$donnees['rue'].'</td>';
			echo '<td class="Tableau">'.$donnees['cp'].'</td>';
			echo '<td class="Tableau">'.$donnees['ville'].'</td>';
			//echo '<td class="Tableau">'.$donnees['image'].'</td>';
			echo '<td class="Tableau">'.$donnees['telephone'].'</td>';
			echo '<td class="Tableau">'.$donnees['horaires'].'</td>';
			echo '<td class="Tableau">
			<a href="SuprBoutique.php?supBout='.$donnees['id'].'">
			<img src="Images/supprimer.png" /></a></td>';
				
			echo '</tr>';
			
		}
		echo '</table>';
		//echo '<h4 class=resultat>Il ya '.$nbLignes.' résultats ';
	}

	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
}
?>
<?php
function creaTableauCompte ($base,$hote,$utilisateur,$mdp){
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);


		$reponse = $bdd->prepare('SELECT * FROM compte');
			
		$reponse->execute();
			
		$nbLignes = $reponse->rowCount();
			//EN TETE TABLEAU
		echo '<table class="FormeTab" width="600px" height="400px">';
		echo '<thead>';
		echo '<tr>';
		echo'<th class="EnTeteTab">Numéro</th>';
		echo'<th class="EnTeteTab">Login</th>';
		echo'<th class="EnTeteTab">Mots de passe</th>';
		echo'<th class="EnTeteTab">AdminG</th>';
		echo'<th class="EnTeteTab">Nom</th>';
		echo'<th class="EnTeteTab">Prenomr</th>';
		echo'<th class="EnTeteTab">Boutique associé</th>';
		
		echo '</tr>';
		echo '</thead>';
		while ( $donnees = $reponse->fetch()) {
			//CONTENU A AFFICHER PAR LIGNE
			echo '<tr>';
			echo '<td class="Tableau">'.$donnees['Id'].'</td>';
			echo '<td class="Tableau">'.$donnees['Login'].'</td>';
			echo '<td class="Tableau">'.$donnees['mdpCompte'].'</td>';
			echo '<td class="Tableau">'.$donnees['AdminG'].'</td>';
			echo '<td class="Tableau">'.$donnees['nomUser'].'</td>';
			echo '<td class="Tableau">'.$donnees['prenomUser'].'</td>';
			echo '<td class="Tableau">'.$donnees['boutique_id'].'</td>';
			
				
			echo '</tr>';
			
		}
		echo '</table>';
		//echo '<h4 class=resultat>Il ya '.$nbLignes.' résultats ';
	}

	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
}
?>