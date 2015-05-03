<?php
include_once 'param/id.php';

if(isset($_POST['txtMatriculeTech']) && isset($_POST['txtintervTech']) && isset($_POST['txtNouvTech']) && isset($_POST['txtModifTech']) 
   && isset($_POST['txtCompTech']) && isset($_POST['txtForumTech'])&& isset($_POST['cmdValider'])){
	$NomMatricule = $_POST['txtMatriculeTech'];
	$nbinter= $_POST['txtintervTech'];
	$nbNouv = $_POST['txtNouvTech'];
	$mod = $_POST['txtModifTech'];
	$comp = $_POST['txtCompTech'];
	$Forum = $_POST['txtForumTech'];
	
	$totalPT=0;
	$SommeArt=$nbNouv+$mod+$comp;
	$PtForum=10*$Forum;
	
	if ($nbinter > 200){
		$totalPT = $totalPT + 20;
	}
	elseif ($SommeArt >$nbinter ){
		$totalPT = $totalPT +50;
	}
	elseif ($Forum > 0){

		$totalPT = $totalPT + $PtForum;
	}
	elseif ($Forum >=  5 && $Forum <6){
	
		$totalPT = $totalPT + 20;
	}		
	elseif ($Forum >= 6){
	
		$totalPT = $totalPT + 30;
	
}
}
?>
<?php 
try
{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host='.$hote.';dbname='.$base, $utilisateur, $mdp);
	$bdd->exec('SET NAMES utf8');
	$insertion = $bdd->prepare('INSERT INTO resultat (NomMatricule,nbinter,nbNouv,mod,comp)
							VALUES ($NomMatricule, $nbinter, $nbNouv, $mod, $comp)');
	
						echo'<div class="parag1">
							<h4 class="titre">Statistique enregistré !</h4>
							<br/>
							<div>Votre scrore est de '.$totalPT.'</div>
						</div>';
	
						$insertion->closeCursor(); 
  					} 
catch (Exception $erreur) 
					{ 
						die('Erreur : ' . $erreur->getMessage()); 
					}     
?>
