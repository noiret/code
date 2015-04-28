<?php
include 'function_base.php';

base();
include 'Connection_Base.php'
?>

	<div class="bandeauTitre">
	<div class="titre">
		Catalogue
		</div>
	</div>
	<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue1.php?categ=cuisine">cuisine</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue1.php?categ=gadget">Gadget</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue1.php?categ=mode">Mode</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue1.php?categ=portable">Portable</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue1.php?categ=usb">USB</a></li>
			</ul>
	</div>
	
	<?php 
		if(isset($_GET['categ'])){
	?>
	<span class="titre"><?php echo $_GET['categ'] ?> </span>
	<?php } ?>
  <?php
	if(isset($_GET['categ']))
	{
		echo "la categorie choisie est ".$_GET['categ'];
		$nom=$_GET['categ'];
		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
		
			// ici les traitements
			// Spécification de l'encodage (en cas de problème d'affichage :
			$bdd->exec('SET NAMES utf8');
			$reponse = $bdd->prepare('SELECT nom,description,image,prix FROM produit P ,categorie C where P.categorie=C.categorie_id and C.libelle=?'); // Envoi de la requête
			$nb = $reponse->execute(array($nom));// Compte du nombre de lignes retournées
			echo '<table class="tableau_categorie">'; // Déclaration d'un tableau et de sa ligne d'en-tête
			while ( $donnees = $reponse->fetch() ) // Découpage ligne à ligne de $reponse
			{
				echo '<tr>'; // Une ligne appelle les données de $donnees['']
				echo '<td >'.$donnees['nom'].'</td>';
				echo '<td >'.$donnees['description'].'</td>';
				echo '<td ><img src="img/images/'.$nom.'/'.$donnees['image'].'"height="200px" width="200px"></td>';
				echo '<td >'.$donnees['prix'].'</td>';
				echo '</tr>';
			
			}
			echo '</table>'; // Fin du tableau
			$reponse->closeCursor();
		
		}
		catch (Exception $erreur)
		{
			die('Erreur : ' . $erreur->getMessage());
		}

	}
	?>
	</div>

</body>
</html>
