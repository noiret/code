<?php session_start(); ?>

<body>

<?php 
	if(isset ($_SESSION['loginPeople'])) {?>
	
	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/fonctions.inc.php'; ?>

	<?php 
	if (isset($_GET['nbMaxL']) && isset($_GET['nbMaxC']))
		{
		$nbMaxl=$_GET['nbMaxl'];
		$nbMaxC=$_GET['nbMaxC'];
		 FaireUnTableau('$nbMaxL','$nbMaxC');
		}
	else 
		{
		echo'Erreur';
		}
	?>
	
	<?php 
	}
	else  {
	echo '<div class=menu> Contenu réservé aux utilisateurs connectés ! 
		
		<a href="index.php">Se connecter</a> </div>';
	} 
	?>


</body>
