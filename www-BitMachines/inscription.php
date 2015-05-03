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
	<?php include_once 'param/id.php'; ?> 
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
			<?php 
				if(isset($_POST['cmdValider'])
				&& isset($_POST['txtNomTech']) && !empty($_POST['txtNomTech'])
				&& isset($_POST['txtPrenomTech']) && !empty($_POST['txtPrenomTech'])
				&& isset($_POST['lstAgeTech']) && !empty($_POST['lstAgeTech'])
				&& isset($_POST['txtAdresseTech']) && !empty($_POST['txtAdresseTech'])
				&& isset($_POST['txtCpTech']) && !empty($_POST['txtCpTech'])
				&& isset($_POST['txtVilleTech']) && !empty($_POST['txtVilleTech'])
				&& isset($_POST['txtMailTech']) && !empty($_POST['txtMailTech'])
				&& isset($_POST['txtTelTech']) && !empty($_POST['txtTelTech'])
				&& isset($_POST['optSecTech']) && !empty($_POST['optSecTech']))
				{
					$nomTech = htmlspecialchars($_POST['txtNomTech']); 
					$prenomTech = htmlspecialchars($_POST['txtPrenomTech']);
					$ageTech = $_POST['lstAgeTech'];
					$adresseTech = htmlspecialchars($_POST['txtAdresseTech']); 
					$cpTech = htmlspecialchars($_POST['txtCpTech']); 
					$villeTech = htmlspecialchars($_POST['txtVilleTech']); 
					$mailTech = htmlspecialchars($_POST['txtMailTech']); 
					$telTech = htmlspecialchars($_POST['txtTelTech']); 
					$secteurTech = $_POST['optSecTech']; 
					
					try 
					{ 
						$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; 
						$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp); 
						$bdd->exec('SET NAMES utf8'); 
						$insertion = $bdd->prepare('INSERT INTO technicien (nom_tech, prenom_tech, 
							adresse_tech, ville_tech, cp_tech, tel_tech, email_tech, age, secteur)
							VALUES (:nom, :prenom, :adresse, :ville, :cp, :tel, :mail, :age, :secteur)'); 
						$insertion->execute(array( 
							'nom' => $nomTech, 
							'prenom' => $prenomTech, 
							'adresse' => $adresseTech,
							'ville' => $villeTech,
							'cp' => $cpTech,
							'tel' => $telTech, 
							'mail' => $mailTech,
							'age' => $ageTech, 
							'secteur' => $secteurTech) );
						?>
						<div class="parag1">
							<h4 class="titre">Votre inscription a bien été prise en compte.</h4>
						</div>
						<?php
						$insertion->closeCursor(); 
  					} 
					catch (Exception $erreur) 
					{ 
						die('Erreur : ' . $erreur->getMessage()); 
					}     
				}
				else {
					?>
					<div class="parag1">
						<!-- Module d'authentification en cours de développement par une autre équipe -->
						<h2 class="titre">Inscription d'un technicien</h2>
					</div>
					<form id="frmInscription" name="frmInscription" method="post" action="inscription.php">
					<fieldset>
						<legend>Compléter les informations suivantes :</legend>
						<h4 class="titre">Informations personnelles :</h4>
						Nom : <input type="text" name="txtNomTech" id="txtNomTech" maxlength="20" size="20" /><br/><br/>
						Prénom : <input type="text" name="txtPrenomTech" id="txtPrenomTech" maxlength="20" size="20" /><br/><br/>
						Age :
						<select id="lstAgeTech" name="lstAgeTech">
						<?php 
		
		try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		// ici les traitements
		// Sp�cification de l'encodage (en cas de probl�me d'affichage :
		$bdd->exec('SET NAMES utf8');
		$reponse = $bdd->prepare('SELECT distinct libelle_age FROM tranche_age');
		$reponse->execute( array() );
		while ($donnees = $reponse->fetch() )
		{
			echo '<option value="'.$donnees['libelle_age'].'">'.$donnees['libelle_age'].'</option>';
			}
		$reponse->closeCursor();
		}
		catch (Exception $erreur)
		{
			die('Erreur : ' . $erreur->getMessage());
		}
		?>
		</select><br/><br/>
						Adresse : <input type="text" name="txtAdresseTech" id="txtAdresseTech" maxlength="40" size="40" /><br/><br/>
						Code postal : <input type="text" name="txtCpTech" id="txtCpTech" maxlength="5" size="5" />&nbsp;
						Ville : <input type="text" name="txtVilleTech" id="txtVilleTech" maxlength="20" size="20" /><br/><br/>
						<h4 class="titre">Informations professionnelles :</h4>
						Mail : <input type="text" name="txtMailTech" id="txtMailTech" maxlength="40" size="40" /><br/><br/>
						Téléphone : <input type="text" name="txtTelTech" id="txtTelTech" maxlength="10" size="10" /><br/><br/>
						Secteur géographique fréquenté principalement :<br/>
						Brest <input type="radio" name="optSecTech" id="optSecTech" value="2" />
						Caen <input type="radio" name="optSecTech" id="optSecTech" value="3" />
						Cherbourg <input type="radio" name="optSecTech" id="optSecTech" value="1" />
						Le Mans <input type="radio" name="optSecTech" id="optSecTech" value="5" />
						Rennes <input type="radio" name="optSecTech" id="optSecTech" value="4" />
						Tours <input type="radio" name="optSecTech" id="optSecTech" value="6" /><br/><br/>
						<br/>
						<input name="brReset" type="reset" value="réinitialiser" /><input name="cmdValider" type="submit" value="valider" />
					</fieldset>
					</form>
					<?php 
				}
			?>
		</div>
	</div>
</body>
</html>
