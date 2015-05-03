<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>DEPOTL</title>
<link rel= "stylesheet" type="text/css" media="screen" href="css/stylestage.css">
</head>
<body>
<div class="page">

	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/BDD.php'; ?>

<?php 
	//AJOUT DE STAGE VIA FORMULAIRE
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		
 ?>

	  	<form id="f2" name="f2" method="POST" action="depot.php">
	  	<fieldset>
		<legend>Ajout d'un stage :</legend>
			Offre de l'entreprise : <input  type="text" id="entrepriseOffre" name="entrepriseOffre" required="required"/><br/>
			Lieu de l'offre :   <input type="text" id="LieuOffre" name="LieuOffre"  required="required"/><br/>
			Sujet du stage :    <input  type="text" id="SujetOffre" name="SujetOffre"  required="required"/> <br/>
			Duree du stage : 	<input type="number" id="DureeOffre" name ="DureeOffre"  required="required" /> <br/>
			Ann�e du stage :    <input class="question" type="radio" id="AnneOffre" name="AnneOffre" value="1ans" checked="checked"/>1�re ann�e
				    			<input class="question" type="radio" id="AnneOffre" name="AnneOffre" value="2ans"/>2�me ann�e<br/>
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
	
	if (isset($_POST['bEnvoieAjout']) && isset($_POST['entrepriseOffre']) && isset($_POST['LieuOffre']) && isset($_POST['SujetOffre']) && isset($_POST['DureeOffre']) && isset($_POST['AnneOffre']) ){
	$entrepriseOffre = htmlspecialchars($_POST['entrepriseOffre']);
	$LieuOffre = htmlspecialchars($_POST['LieuOffre']);
	$SujetOffre = htmlspecialchars($_POST['SujetOffre']);
	$DureeOffre = $_POST['DureeOffre'];
	$AnneOffre = $_POST['AnneOffre'];
	
	
	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$enregistrement = $bdd->prepare('INSERT INTO  offrestage (id,entrepriseOffre,lieuOffre,sujetStageOffre,dureeStageOffre,anneeOffre) VALUES (\'\', :ENTREPRISEOFFRE,:LIEUOFFRE,:SUJETSTAGEOFFRE,:DUREESTAGEOFFRE,:ANNEEOFFRE)');
	$enregistrement ->execute(array('ENTREPRISEOFFRE'=> $entrepriseOffre, 'LIEUOFFRE' => $LieuOffre , 'SUJETSTAGEOFFRE'=> $SujetOffre , 'DUREESTAGEOFFRE'=> $DureeOffre, 'ANNEEOFFRE'=> $AnneOffre ));
	$GenID= $bdd->lastInsertId();
	echo '<h1 class="titreSite"> Votre formulaire de stage pour '.$entrepriseOffre.' a '.$LieuOffre.' a bien �t� enregistr� avec l\'identifiant '.$GenID.'</h1>';
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
</body>
</html>