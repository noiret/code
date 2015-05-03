<?php
	echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>BITMACHINE::Concours::base de connaissances</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
	<div id="main">
		<div class="entete">
	 		<img id="" src="img/logo-bitmachines.png" />
		</div>
		<div class="menu">
			<div class="eltMenu" onclick="location.href='index.php'">home</div>
			<div class="eltMenu" onclick="location.href='inscription.php'">inscription</div>
			<div class="eltMenu" onclick="location.href='saisieStats.php'">saisie stats</div>
			<div class="eltMenu" onclick="location.href='resultats.php'">résultats</div>
			<div class="eltMenu" onclick="location.href='administration.php'">administration</div>
		</div>
		<div class="centre">
			<div class="parag1">
				<!-- Module d'authentification en cours de développement par une autre équipe -->
				<h2 class="titre">Saisie des statistiques d'un candidat</h2>
				Attention à ne saisir les statistiques qu'une seule fois par candidat et par semaine !<br/><br/>
			</div>
			<form id="frmSaisieStats" name="frmSaisieStats" method="post" action="enregResultat.php">
			<fieldset>
				<legend>Compléter les informations suivantes :</legend>
				<h4 class="titre">Le technicien :</h4>
					<form id="f2" name="f2" method="POST" action="enregResultat.php">
				Matricule : <input type="text" name="txtMatriculeTech" id="txtMatriculeTech" maxlength="8" size="10" />&nbsp;
				Participation numéro :
				<select id="lstPartTech" name="lstPartTech">
					<option value="1">numéro 1</option>
					<option value="2">numéro 2</option>
					<option value="3">numéro 3</option>
					<option value="4">numéro 4</option>
					<option value="5">numéro 5</option>
					<option value="6">numéro 6</option>
				</select><br/><br/>
				<h4 class="titre">Statistiques du technicien :</h4>
				
			
				
				Nombre d'interventions : <input type="text" name="txtintervTech" id="txtintervTech" maxlength="3" size="7" /><br/><br/>
				Nombre de nouveaux articles : <input type="text" name="txtNouvTech" id="txtNouvTech" maxlength="3" size="7" /><br/><br/>
				Nombre d'articles modifiés : <input type="text" name="txtModifTech" id="txtModifTech" maxlength="3" size="7" /><br/><br/>
				Nombre d'articles complétés : <input type="text" name="txtCompTech" id="txtCompTech" maxlength="3" size="7" /><br/><br/>
				Nombre de participations aux forums : <input type="text" name="txtForumTech" id="txtForumTech" maxlength="3" size="7" /><br/><br/><br/>
				<input name="brReset" type="reset" value="réinitialiser" /><input name="cmdValider" type="submit" value="valider" />
				</form>
			</fieldset>
			</form>
		</div>
	</div>
</body>
</html>
