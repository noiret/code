<?php session_start(); ?>
<?php
if(isset ($_SESSION['loginPeople'])) {?>
	<?php 
	}
	else  {
	echo '<div class=menu> Contenu r�serv� aux utilisateurs connect�s ! 
		
		<a href="index.php">Se connecter</a> </div>';
	} 
	?>