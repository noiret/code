<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>MEGA SITE</title>
<link rel= "stylesheet" type="text/css" media="screen" href="css/stylemega.css">
</head>
<body>
<div class="page">

	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/BDD.php'; ?>

	
	&nbsp;
	<div class="titre">
	<br><u>Mega site:</u> spécialiste des programmes de ouf en Piachepi<br>
	
	&nbsp;


	
	<?php 
	if (isset($_POST['unLoginPeople']) && isset($_POST['unMdpPeople']) ){
	$unLogin = htmlentities($_POST['unLoginPeople']);
	$unMdp = htmlentities($_POST['unMdpPeople']);

	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		$VerifMdp = $bdd->prepare('SELECT * FROM people WHERE loginPeople = :loginPeople AND mdpPeople = MD5(:mdpPeople)');
		$VerifMdp ->execute(array('loginPeople'=> $unLogin, 'mdpPeople' => $unMdp ));
		
		$nb = $VerifMdp->rowCount();
		if ( $nb >= 1 ){
			$donnees = $VerifMdp->fetch();
			echo '<script>alert(\'Vous etes authentifiée comme '.$donnees['loginPeople'].'\');</script>';
			$_SESSION['loginPeople']=$donnees['loginPeople'];
			$_SESSION['statutPeople']=$donnees['statutPeople'];
			echo'<a href="incription.php">Redirection sur la page d\'inscription ...</a>';
		}
		else {
	echo 'Erreur d\'authentification';
			}
	}
	catch (Exception $erreur)
	{
		die ('Erreur : '.$erreur->getMessage());
				}
	}
	
	if ( isset($_GET['deconnexion'])){
	$_SESSION = array();
	session_destroy();
	}

	if(!isset ($_SESSION['loginPeople'])){?>
	<br>Soyez les bienvenus ici ! , connectez vous vite !<br>
	<br/>
	<form name="formIdent" id="FormIdent" method="POST" action ="index.php">
	<fieldset>
	<legend>Connexion :</legend>
	
	Login : <input class="question" type="text" id="unLoginPeople" name="unLoginPeople" required="required"/>
	Mots de passe : <input class="question" type="password" id="unMdpPeople" name="unMdpPeople" required="required"/>
	
	<input name="bResetCo" type="reset" value="effacer" />
	<input name="bValiderCo" type="submit" value="valider" />
	</fieldset>
	</form>
	<br/>


	<?php }
	else {
	echo '<a href="index.php?deconnexion=1">Se déconnecter</a>';
	} ?>
	</div>
	</div>
</body>
</html>