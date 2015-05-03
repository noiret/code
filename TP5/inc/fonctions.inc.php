<?php
function FaireUnTableau($MaxL,$MaxC){
	echo '<table>';
	$l = 1;
	while ($l <= $MaxL) {
		echo '<tr>';
		$c=1;
		while ($c <= $MaxC){
			if ($l % 2 ==0){
				echo '<td class="jaune">Ligne : '.$l.' Col: '.$c.'</td>';
			}
			else {
				echo '<td class="rouge">Ligne :'.$l.' Col:'.$c.'</td>';
			}
			$c=$c+1;
		}
		echo '<tr>';
		$l=$l+1;
		}
	echo '</table>';
}
?>
<?php
function construitTab($maxLigne,$maxColonne){
	echo '<br><u><em>Voici un tableau de '.$maxLigne.' lignes pour '.$maxColonne.' colonnes</em></u><br> </div>';
	$nbLignes = $maxLigne;
	$ligne = 1;
	echo '<table>';
	while ( $ligne <= $nbLignes ){
		$nbColonnes = $maxColonne;
		$colonne = 1;
		echo '<tr>';
		while ( $colonne <= $nbColonnes ) {
			if ($ligne % 2 ==0){
			echo '<td class ="ligne1">ligne '.$ligne.', colonne'.$colonne. '</td>';
			}
			else{
			echo '<td class ="ligne2">ligne '.$ligne.', colonne'.$colonne. '</td>';
			}
			$colonne = $colonne + 1; // ou $colonne++;
			}		
			echo '</tr>';
		$ligne = $ligne + 1;// ou $ligne++;
		}
	echo '</table>';
}

?>
	
