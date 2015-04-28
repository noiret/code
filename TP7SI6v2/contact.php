<?php session_start(); ?>
<?php
if(isset ($_SESSION['loginPeople'])) {?>
	<?php 
	}
	else  {
	echo '<div class=menu> Contenu réservé aux utilisateurs connectés ! 
		
		<a href="index.php">Se connecter</a> </div>';
	} 
	?>