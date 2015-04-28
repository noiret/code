
<?php 
	include 'ScriptBoutique.php';
	MenuVertical();
?>

	<div class="bandeauTitre">
	<div class="titre">
		Les Boutiques
		</div>
	</div>
	<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=1">Boutique Valence</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=2">Boutique Grenoble</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=3">Boutique Lyon</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=4">Boutique Chambery</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=5">Boutique Alberville</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=6">Boutique Annecy</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Boutique1.php?bout=7">Boutique Clermond ferrand</a></li>
			</ul>
	</div>
	
	
<?php 
	if (isset($_GET['bout']))
	{
		$id=$_GET['bout'];
		Tableau($id);
	}
	
?>

</body>
</html>
