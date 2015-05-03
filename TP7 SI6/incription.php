<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/stylemega.css"/>
</head>
<body>
	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/BDD.php'; ?>
	<?php  include_once 'inc/tris.php'; ?>
	<div class="page">
	<form name="tris" id="tris" method="POST" action ="incription.php">
		<fieldset>
		<legend>Tri des people:</legend>
		selon l'id <input class="question" type="radio" id="tri" name="tri" value="idPeople" checked="checked"/>
		selon le nom <input class="question" type="radio" id="tri" name="tri" value="nomPeople"/>
		selon le sexe <input class="question" type="radio" id="tri" name="tri" value="sexePeople"/>
		selon l'age <input class="question" type="radio" id="tri" name="tri" value="agePeople"/>
		selon la ville <input class="question" type="radio" id="tri" name="tri" value="villePeople"/>
		
		<input name="b2" type="submit" value="valider" />
		</fieldset>
	</form>		
	<?php 
	 include_once 'inc/BDD.php';
	 include_once 'inc/tris.php';
	 
	
	creaTableau($_POST['tri'],$base,$hote,$utilisateur,$mdp);
	?>
	<?php 
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp); ?>

	    <form id="f2" name="f2" method="POST" action="inscription.php">
	   <fieldset>
		<legend>Ajout de people :</legend>
		Nom : <input  type="text" id="Nom" name="Nom" /><br/>
		Prénom <input type="text" id="Prenom" name="Prenom" /><br/>
	     Sexe :  <input class="question" type="radio" id="Sexe" name="Sexe" value="Homme"/>homme
				 <input class="question" type="radio" id="Sexe" name="Sexe" value="Femme"/>femme <br/>
			Age : <input  type="text" id="Age" name="Age" /> <br/>
			Ville : <select id="ChoixVille" name ="ChoixVille">
			<?php 
			$reponseVille= $bdd->prepare('SELECT distinct villePeople FROM people');
			$reponseVille->execute();
			while($donnees = $reponseVille->fetch()) {
			echo '<option value="'.$donnees['villePeople'].'">'.$donnees['villePeople'].'</option>';
					}
			$reponseVille->closeCursor();

}
	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage() );
	}
			?>

			</select>
			
			<br/><br/>
		<input name="b1" type="reset" value="effacer" />
		<input name="b2" type="submit" value="valider" />
	</fieldset>
	</form>
	<?php 
	if (isset($_POST['Nom']) && isset($_POST['Prenom'])){
	$Nom = htmlspecialchars($_POST['Nom']);
	$Prenom = htmlspecialchars($_POST['Prenom']);
	$sexe = $_POST['Sexe'];
	$age = $_POST['Age'];
	$ville = htmlspecialchars($_POST['ChoixVille']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO produit (idPeople,nomPeople,prenomPeople,sexePeople,agePeople,villePeople) VALUES (\'\', :id,:nom,:prenom,:sexe,:age,:villePeople)');
	$enregistrement ->execute(array('nom'=> $Nom, 'prenom' => $Prenom , 'sexe'=> $Sexe , 'age'=> $Age, 'villePeople'=> $ville ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> Le nouveau people '.$Nom.' '.$prenom.' a bien été enregistré avec l\'identifiant '.$GenID.'</h1>';
	$enregistrement->closeCursor();
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' .$erreur->getMessage());
		
	}
	
	}
	else {
		echo '<h1 class="titreSite">Erreur, tous les champs n\'ont pas été renseignée !';
	}
	
	?>
	</div>
</body>
</html>