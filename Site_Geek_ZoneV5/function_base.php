<?php
function base()
{
	echo'<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<link rel="icon" type="image/ico" href="img/LogoPage2.ico">
	<title>Accueil</title>
	</head>
	<body>
	
	<div class="main">
	<div class="Menu_vertical">
	<img src="img/Logo + titre.png" width="250" height="220" usemap="#carteMenu"/>
	<ul class="menu">
	<li><a class="menu" href="Index.php"><span>Accueil</span></a></li>
	<li><a class="menu" href="Boutique1.php"><span>Boutique</span></a></li>
	<li><a class="menu" href="Catalogue1.php"><span>Catalogue</span></a></li>
	<li><a class="menu" href="Connexion.php"><span>Connexion</span></a></li>
	</ul>
	</div>';
}
function affiche($nom)
{
	$row = 1;
	$nomFichier=$nom.".csv";
	if (($handle = fopen($nomFichier, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if($row>1)
			{
				$nomRepertoir="img/images/".$nom."/".$data[4];
?>
<tr>
       <td><img src="<?php echo $nomRepertoir;?>" height="200px" width="200px" usemap="#carteMen"></td>
       <td height="200px" width="300px"><?php echo $data[1];?></td>
       <td height="200px" width="100px"><?php echo $data[2];?></td>
   </tr>
<?php 
			}
			$row++;
			
		}
		fclose($handle);
	}
}
?>