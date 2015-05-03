<body>
	<?php  include_once 'inc/titre.inc.php'; ?>
	<?php  include_once 'inc/bmenu.inc.php'; ?>
	<?php  include_once 'inc/fonctions.inc.php'; ?>

	<?php 
	if (isset($_GET['nbMaxL']) && isset($_GET['nbMaxC']))
		{
		nbMaxl=$_GET['nbMaxl'];
		nbMaxl=$_GET['nbMaxl'];
		 FaireUnTableau('nbMaxl','nbMaxC')
		}

		else 
		{
		echo'Erreur';
		}
	?>


</body>
