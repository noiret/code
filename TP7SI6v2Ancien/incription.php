<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>MEGA SITE</title>
<link rel= "stylesheet" type="text/css" media="screen" href="css/stylemega.css">
</head>
	<body>
	<?php 
	if(isset ($_SESSION['loginPeople'])) {?>
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
	 if (isset($_POST['tri'])){
		$tri=$_POST['tri'];
		creaTableau($tri,$base,$hote,$utilisateur,$mdp);
		}
		else{	
		creaTableau('idPeople',$base,$hote,$utilisateur,$mdp);
	}
	?>
	<?php 
	
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp); ?>

	    <form id="f2" name="f2" method="POST" action="incription.php">
	   <fieldset>
		<legend>Ajout de people :</legend>
			Nom : 	<input  type="text" id="Nom" name="Nom" required="required"/><br/>
			Prénom 	<input type="text" id="Prenom" name="Prenom"  required="required"/><br/>
	    	Sexe :  <input class="question" type="radio" id="Sexe" name="Sexe" value="H" checked="checked"/>homme
				    <input class="question" type="radio" id="Sexe" name="Sexe" value="F"/>femme <br/>
			Age :   <input  type="text" id="Age" name="Age"  required="required"/> <br/>
			Ville : <input list="listeVille" type="text" id="Ville" name ="Ville"  required="required" placeholder="choissisez la ville"/>
	    		<datalist id="listeVille" >
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

		</datalist>
		
			
			<br/><br/>
			<input name="bResetAjout" type="reset" value="effacer" />
		<input name="bEnvoieAjout" type="submit" value="valider" />
		</fieldset>
		</form>
	<?php 
	
	if (isset($_POST['bEnvoieAjout']) && isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Sexe']) && isset($_POST['Age']) && isset($_POST['Ville']) ){
	$Nom = htmlspecialchars($_POST['Nom']);
	$Prenom = htmlspecialchars($_POST['Prenom']);
	$Sexe = $_POST['Sexe'];
	$Age = $_POST['Age'];
	$ville = htmlspecialchars($_POST['Ville']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO people (idPeople,nomPeople,prenomPeople,sexePeople,agePeople,villePeople) VALUES (\'\', :nom,:prenom,:sexe,:age,:ville)');
	$enregistrement ->execute(array('nom'=> $Nom, 'prenom' => $Prenom , 'sexe'=> $Sexe , 'age'=> $Age, 'ville'=> $ville ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> Le nouveau people '.$Nom.' '.$Prenom.' a bien été enregistré avec l\'identifiant '.$GenID.'</h1>';
	$enregistrement->closeCursor();
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }

	
	?>
	
	<?php 
	
	if (isset($_GET['suppPeople']) ){
	$SupPeople = ($_GET['suppPeople']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$suppresion = $bdd->prepare('DELETE FROM people WHERE idPeople=:id');
	$suppresion ->execute(array('id'=> $SupPeople));
	
	echo '<h1 class="titreSite"> Le people <i>numéro '.$SupPeople.' </i> a bien été supprimé ! </h1>';
	$enregistrement->closeCursor();
	}
	catch (Exception $erreurSup)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }
 
	?>
	
	<?php 
	
	if (isset($_GET['ModifPeople']) ){
	$ModifierPeople = ($_GET['ModifPeople']);
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	
	$Modification = $bdd->prepare('SELECT * FROM people WHERE idPeople = ?');
	$reponseVille= $bdd->prepare('SELECT distinct villePeople FROM people');
	
	$Modification ->execute(array($ModifierPeople));
	while($donnees = $Modification->fetch()) {
	echo'
	<form id="f3" name="f3" method="POST" action="incription.php">
	<fieldset>
	<legend>Mofication du people :</legend>                                                       
	<input  type="hidden" id="id" name="id" value="'.$donnees['idPeople'].'"/><br/>
	Nom : 	<input  type="text" id="Nom" name="Nom" value="'.$donnees['nomPeople'].'"  required="required"/><br/>
	Prénom 	<input type="text" id="Prenom" name="Prenom" value="'.$donnees['prenomPeople'].'" required="required"/><br/>';
	if ( $donnees['sexePeople'] == 'H' ) {
	echo 'Sexe :  <input class="question" type="radio" id="Sexe" name="Sexe" value="H" checked="checked"/>homme
			<input class="question" type="radio" id="Sexe" name="Sexe" value="F"/>femme <br/>';
	}
	else{
echo 'Sexe :  <input class="question" type="radio" id="Sexe" name="Sexe" value="H"/>homme
			<input class="question" type="radio" id="Sexe" name="Sexe" value="F" checked="checked"/>femme  <br/>';
}
	echo'Age :   <input  type="text" id="Age" name="Age" value="'.$donnees['agePeople'].'"  required="required"/> <br/>
		Ville : <input list="listeVille" type="text" id="Ville" name ="Ville" value="'.$donnees['villePeople'].'"  required="required"/>
	    		<datalist id="listeVille" >';
	
			$reponseVille->execute();
			while($donnees = $reponseVille->fetch()) {
			echo '<option value="'.$donnees['villePeople'].'">'.$donnees['villePeople'].'</option>';
					}
			$reponseVille->closeCursor();
			echo'</datalist>';
			
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
	
	if (isset($_POST['bEnvoieModif']) && isset($_POST['id']) && isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Sexe']) && isset($_POST['Age']) && isset($_POST['Ville']) ){
	$Nom = htmlspecialchars($_POST['Nom']);
	$Prenom = htmlspecialchars($_POST['Prenom']);
	$Sexe = $_POST['Sexe'];
	$Age = $_POST['Age'];
	$ville = htmlspecialchars($_POST['Ville']);
	$id = $_POST['id'];
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('UPDATE people SET nomPeople=:nom,prenomPeople=:prenom,sexePeople=:sexe,agePeople=:age,villePeople=:ville WHERE idPeople=:id');
	$enregistrement ->execute(array('nom'=> $Nom, 'prenom' => $Prenom , 'sexe'=> $Sexe , 'age'=> $Age, 'ville'=> $ville , 'id'=>$id ));
	echo '<h1 class="titreSite"> Le people '.$Nom.' '.$Prenom.' a bien été modifié</h1>';
	$enregistrement->closeCursor();
	}
	catch (Exception $erreur)
	{
		die('Erreur : ' .$erreur->getMessage());
	}
  }
	?>
	</div>
	<?php 
	}
	else  {
	echo '<div class=menu> Contenu réservé aux utilisateurs connectés ! 
		
		<a href="index.php">Se connecter</a> </div>';
	} 
	?>
	
	</body>	
	
</body>
</html>