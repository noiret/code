
<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
	<link rel="icon" type="image/ico" href="../img/LogoPage2.ico">
	
	</head>
	<body>
	
	<div class="main">
	<div class="Menu_vertical">
	<img src="../img/Logo + titre.png" width="250" height="220" usemap="#carteMenu"/>
	<ul class="menu">
	<li><a class="menu" href="Index.php"><span>Accueil</span></a></li>
	<li><a class="menu" href="Boutique1.php"><span>Boutique</span></a></li>
	<li><a class="menu" href="Catalogue1.php"><span>Catalogue</span></a></li>
	<li><a class="menu" href="Connexion.php"><span>Connexion</span></a></li>
	</ul>
	</div>	<div class="bandeauTitre">
	<div class="titre">
		Espace d'administration
		</div>
	</div>
	<body>
	<div class="contenu">
		<div class="barre_categorie_orizontal">
			<ul class="menu_categorie">
			
				<li class="menu_categorie"><a class="menuCatO" href="boutique.php">Boutique</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="Catalogue.php">Catalogue</a></li>
				<li class="menu_categorie"><a class="menuCatO" href="ModifMDP.php">Compte</a></li>
				
			</ul>
	</div>
			<div class="contenuBandeau">
		<div class="bandeauAdminGBoutique">
	<ul>
		<li><a class="AdminGbandeau" href="Catalogue.php"><span>Inserer un produit</span></a><li>
	</ul>
	</div>
	<div class="textBandeau">
			Chossisez une catalogue:<select name="listeBoutique" size="1">
		<option value="B1">B1</option>
		<option value="B2">B2</option>
		<option value="B3" selected="selected">B3</option>
		</select><br/>
			Nom: <input type="text" name="nom" /><br/>
			Description: <input type="text" name="nom"/><br/>
			Detail: <input type="text" name="nom"/><br/>
			Prix: <input type="text" name="nom"/><br/>
			Image boutique : <input class="question" type="file" id="Img" name="Img"/><br/>
			Categorie: <input type="text" name="nom"/><br/>
			<input class=Enregistrer type="submit" value="Enregistrer">
			</div>
	</div>
	</div>

</body>
</html>