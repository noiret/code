function menu_gauche() {
 var menu = document.createDocumentFragment();
 var _LI = null;
 var texte = new Array();
 var lien = new Array();
 texte[0]="Accueil";
 texte[1]="Nos formations";
 texte[2]="Filière STI";
 texte[3]="Filière STG";
 texte[4]="Enseignement Professionnel";
 texte[5]="Sections de BTS";
 texte[6]="Stages";
 texte[7]="Taxe d'apprentissage";
 texte[8]="Accéder au Lycée";
 texte[9]="Messagerie";
 // A compléter en cas de besoin
 //texte[]="";
 
 lien[0]="accueil.html";
 lien[1]="formations.html";
 lien[2]="STI.html";
 lien[3]="STG.html";
 lien[4]="ens_prof.html";
 lien[5]="bts.html";
 lien[6]="datestagests.html";
 lien[7]="part_et_prof.html";
 lien[8]="acces.html";
 lien[9]="http://mail.lycee-gsh-etampes.org/";
 // A compléter en cas de besoin
 //lien[]="";

 for ( var i=0; i<texte.length; i++) {
  _LI = document.createElement('li');
	_A = document.createElement('a');
	_A.setAttribute("href", lien[i]);
	_A.appendChild(document.createTextNode(texte[i]));
  //_LI.appendChild(document.createTextNode('test'));
	_LI.appendChild(_A);
  menu.appendChild(_LI);
 }
 
 document.getElementById('mg').appendChild(menu);
}

function menu_contact() {
 var menu = document.createDocumentFragment();
 var _LI = null;
 
  _LI = document.createElement('li');
	_A = document.createElement('a');
	_A.setAttribute("href", "contact.html");
	_A.appendChild(document.createTextNode("Contact"));
	_LI.appendChild(_A);
	menu.appendChild(_LI);
	_I = document.createElement('img');
 	_I.setAttribute("src", "images/post.gif");
	//_LI = document.createElement('li');
	_A = document.createElement('a');
	_A.setAttribute("href", "contact.html");
	_A.appendChild(_I);
	//_LI.appendChild(_A);
	//_BR = document.createElement('br');
	//menu.appendChild(_BR);
  //menu.appendChild(_LI);
	menu.appendChild(_A);
  document.getElementById('mc').appendChild(menu);
}

function menus()
{
	menu_gauche();
	menu_contact();
}