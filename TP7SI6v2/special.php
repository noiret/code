<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>MEGA SITEre</title>
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

<p class="ressource" Publier une ressource </p>
<form id="formulaireUpload" method="post" action="special.php" enctype="multipart/form-data">
<fieldset>
<legend>Mettez en ligne votre Image :</legend>
Nom de l'image a mettre en ligne :<input class="question" type="text" id="TitreImage" name="TitreImage" /><br /><br />
Image a mettre en ligne : <input class="question" type="file" id="fichierImage" name="fichierImage" /><br /><br />
<input name="b1" type="reset" value="effacer" />
<input name="b2" type="submit" value="valider" />

</fieldset>
</form>
		<?php 
		
		if ( isset($_POST['TitreImage']) && isset($_FILES['fichierImage']) ) {
			$titreFichier = $_POST['TitreImage'];
			if ( $_FILES['fichierImage']['error'] == 0 ) { //Vérification d'erreur
				$tailleFichier = $_FILES['fichierImage']['size']; //recup Taille
				if ( $tailleFichier <= 1000000 ) { //taille MAX 1MO
					$detailsFichier = pathinfo($_FILES['fichierImage']['name']);
					$extensionFichier = $detailsFichier['extension'];
					$extensionPossibles = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'PNG');
					echo 'poids verifié ';
					if ( in_array($extensionFichier, $extensionPossibles)) { //verif Extension
						$repertoire = 'Images/';
						$nomFichier = $_FILES['fichierImage']['name'];
						echo 'extension verifié ';
						if ( move_uploaded_file($_FILES['fichierImage']['tmp_name'], $repertoire.$nomFichier) ) {
							echo '<h1>L\'image '.$titreFichier.' a bien été téléchargée.</h1>';
							echo '<img src="'.$repertoire.$nomFichier.'"/>';
						}
					}
				}
			}
			else {
				echo '<h1>Erreur de téléchargement</h1>';
			}
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
</body>