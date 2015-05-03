<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>MEGA SITEre</title>
<link rel= "stylesheet" type="text/css" media="screen" href="css/stylemega.css">
</head>
<body>
<div class="page">

	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/fonctions.inc.php'; ?>
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
	
	</div>
	</div>
</body>
</html>