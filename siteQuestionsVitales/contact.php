<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Site des questions vitales</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/sQVScreen.css" />
</head>
<body>
	
	<?php  include_once 'inc/header.inc.php'; ?>
	
	<section>
	<?php  include_once 'inc/aside.inc.php'; ?>
	
		<div class="milieuSite"><!-- Partie oÃ¹ mettre votre code en parties 3 et 4 -->
			
			<div class="divCentrage2">
			
			<?php 
			if (isset($_GET['txtNom']) && isset($_GET['txtPrenom']) && isset($_GET['radioQuestion']) && isset($_GET['listeVitalite'])) {
			echo 'Bonjour '.$_GET['txtNom'].' '.$_GET['txtPrenom'].'';
			echo '<br/>';
			echo 'Nous constatons que votre question vitale est : '.$_GET['radioQuestion'].'';
			echo '<br/>';
			echo 'Le degré de vitalité de cette question est pour vous : ' .$_GET['listeVitalite'];
			echo '<br/>';
			echo '<br/>';
			echo 'Nous allons prendre contact avec vous pour votre traitement.';
			}
			else {
			echo 'Une erreur c\'est produite ! , avez vous remplie la page contact ?';
			}
 			?>
</div>
		</div>
	</section>
</body>
</html>