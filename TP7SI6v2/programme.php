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
	echo'<div class="page">'; ?>

	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/fonctions.inc.php'; ?>
	<?php if(isset ($_SESSION['loginPeople'])) {?>


	&nbsp;
	<div class="titre">
		<?php 
	if (isset($_GET['nbMaxL']) && isset($_GET['nbMaxC']))
		{
		$maxLigne = $_GET['nbMaxL'];
		$maxColonne = $_GET['nbMaxC'];
		construitTab($maxLigne,$maxColonne);
		}
		else 
		{
	echo'<form id="f1" method="GET" action="programme.php">
	<fieldset>
		<legend>Formulaire :</legend>
		Indiquez le nombre de lignes du tableau <input  type="text" id="nbMaxL" name="nbMaxL" /><br/>
		Indiquez le nombre de colonnes du tableau <input type="text" id="nbMaxC" name="nbMaxC" /><br/>
		<br/><br/>
		<input name="b1" type="reset" value="effacer" />
		<input name="b2" type="submit" value="valider" />
	</fieldset>
	</form>';
		}
		?>
		
		<?php 
	}
	else  {
	echo '<div class=menu> Contenu réservé aux utilisateurs connectés ! 
		
		<a href="index.php">Se connecter</a> </div>';
	} 
	?>
	
	</div>
	</div>
</body>
</html>