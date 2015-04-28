<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1"/>
	<title>Site des questions vitales</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/sQVScreen.css" />
</head>
<body>
	
	<?php  include_once 'inc/header.inc.php'; ?>
	
	<section>
	<?php  include_once 'inc/aside.inc.php'; ?>
	
		<div class="milieuSite"><!-- Partie oÃ¹ mettre votre code en parties 3 et 4 -->
	
			<div class="divCentrage">
				
			
				<form id="f1" method="get" action="contact.php">
			
				<pre>Nom : <input class="question" type="text" id="txtNom" name="txtNom"/>                            Prénom : <input class="question" type="text" id="txtPrenom" name="txtPrenom"/> </pre>
				<br/>
				Selon vous , quelle est la question vitale ?
				<br/>
				va t'il neiger ?<input type="radio" id="radioQuestion" name="radioQuestion" value="neige" checked="checked" />
				les extraterestes existe t'il ?<input type="radio" id="radioQuestion" name="radioQuestion" value="les extraterestes existe t'il ?" />
				quel est mon mots de <br/> passe facebook ?<input type="radio" id="radioQuestion" name="radioQuestion" value="quel est mon mots de Facebook" />
				il y'aura t'il des frites a midi ?<input type="radio" id="radioQuestion" name="radioQuestion" value="il y'aura t'il des frites a midi ?" />
				<br/><br/>
				Quellle est le degré de vitalité de cette question ? 
				<br/>
				<select name="listeVitalite" size="1">
				<option value="Extrement vitl vial">Extrement vital</option>
				<option value="Tres vital">Trés vital</option>
				<option value="Je surviverai" selected="selected">Je surviverai</option>
				</select>
				&nbsp;
				<pre>                  				             <input type="reset" value="Effacer"> <input type="submit" value="Envoyer"></pre>
				
				
			</form>
			
		</div>
			
		</div>
	</section>
</body>
</html>