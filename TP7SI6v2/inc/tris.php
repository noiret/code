<?php
function creaTableau ($tri,$base,$hote,$utilisateur,$mdp){
try {
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);


		$reponse = $bdd->prepare('SELECT * FROM people ORDER BY '.$tri);
			
		$reponse->execute();
			
		/*
		 $reponse = $bdd->prepare('SELECT * FROM people');
			
		$reponse->execute();
		*/
		$nbLignes = $reponse->rowCount();
			
		echo '<table class="FormeTab" width="450px" height="400px">';
		while ( $donnees = $reponse->fetch()) {
			echo '<tr>';
			echo '<td class=Tableau">'.$donnees['idPeople'].'</td>';
			echo '<td class=Tableau">'.$donnees['nomPeople'].'</td>';
			echo '<td class=Tableau">'.$donnees['prenomPeople'].'</td>';
			echo '<td class=Tableau">'.$donnees['sexePeople'].'</td>';
			echo '<td class=Tableau">'.$donnees['agePeople'].'</td>';
			echo '<td class=Tableau">'.$donnees['villePeople'].'</td>';
			if ($_SESSION['statutPeople'] == 'A'){
			echo '<td class=Tableau">
			<a href="incription.php?suppPeople='.$donnees['idPeople'].'">
			<img src="Images/supprimer.png" /></a></td>';
			echo '<td class=Tableau">
			<a href="incription.php?ModifPeople='.$donnees['idPeople'].'">
			<img src="Images/modifier.png" /></a></td>';
			echo '</tr>';
		}
		}
		echo '</table>';
		echo '<h4 class=resultat>Il ya '.$nbLignes.' résultats ';
	}

catch (Exception $erreur)
{
	die ('Erreur : '.$erreur->getMessage() );
}
}
?>