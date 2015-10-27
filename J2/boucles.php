<?php
/****************************************
*										*
*	Script d'apprentissage des boucles	*
*	et fonctions utiles en php  		*
*										*
*	Le 01/10/2015						*
*										*
****************************************/

$debut =microtime(true);
include "includes/header.php";// inclusion du header
$tNoms = array('Bruno', 'David', 'Sylvain', 'Samuel','Georges', 'Marcel');
// count() renvoie le nombre d'éléments du tableau
$iNombreElements = count($tNoms);
echo "<ul>"; // liste HTML
for($i=0; $i<$iNombreElements; $i++) // boucle de 0 à 3
{
	echo "<li>".$tNoms[$i]."</li>"; // affichage de l'élément d'indice i
}
echo "</ul>"; // Fin de liste HTML

// tableau associatif( les clefs sont nomées et non numériques)
$Noms2 =array('nom' =>'ARCOLE',
			'prenom' =>'David',
			'PHP',
			4=>' TEST',
			'toto');
//parcours du tableau avec affichage des clés et des valeurs
//le border = 1 est lié à l'absence de feuille de style
echo"<table border='1'><tr><th>Element</th><th>Valeur</th><tr>";
foreach($Noms2 as $cle=>$valeur)
{
	//affichage des valeurs dans un tableau HTML
	echo"<tr><td>".$cle."</td><td>".$valeur."</td></tr>";
}
echo "</table>";

// affichage d'un tableau directement
echo "<pre>".print_r($tNoms,true)."</pre>";

//affichage avec types et longueurs
echo"<pre>";
var_dump($tNoms);
echo"</pre>";

$numerateur = 8;
$tNombres = array (10,5,0,2,8,6,7,12,65,45,36,88,54,12);
echo"<ul>";
foreach($tNombres as $nombres)
	{
		// si on trouve 0 on saute un tour dans la boucle
		// pour eviter une division par 0
		if($nombres == 0) continue;
		echo"<li>".($numerateur/$nombres)."</li>";
		if($nombres == 45) break;// on s'arrete apres avoir trouvé la valeur 45	
	}
	echo "</ul>";


	$variable = "contenu";
	//verification de l'existance d'une variable ou d'un element de tableau
	if(isset($variable)) echo "variable est definie"."<br/>";
	if(isset($Noms2['nom'])) echo "element nom du tableau defini"."<br/>";

	// verification que la variable est definie et non nulle
	if(empty($variable)) echo "la variable est non definie ou nulle"."<br/>";
	else echo "la variable est definie et non nulle.<br/>";
	if(empty($Noms2['nom'])) echo "l'element nom du tableau est non defini ou nul"."<br/>";
	else echo "l'element nom du tableau est defini et non nul.<br/>";
	// verification de la chaine de caracteres
	if(is_string($variable)) echo 'variable est une chaine.<br/>';
	// verification si numerique
	else if (is_numeric($variable))echo 'variable est numerique.<br/>';

	//suppression de la variable
	unset($variable);
	if(isset($variable)) echo "variable est definie"."<br/>";
	else echo "variable non définie"."<br/>";
	if(empty($variable)) echo "la variable est non definie ou nulle"."<br/>";
	else echo "la variable est definie et non nulle.<br/>";

	//suppression d'un element du tableau
	unset($Noms2['nom']);

	//affichage du tableau Noms2
	echo "<pre>".print_r($Noms2, true)."</pre>"."<br/>";

	echo"#######################################################################################################<br/><br/>";
	echo"# # #                                         DATE                                                # # #<br/><br/>";
	echo"#######################################################################################################<br/><br/>";

	//affiche la date j/dd/aaaa hh:mm:ss
	echo date('d/m/Y h:i:s', '123456789')."<br/>";

	//affichage de la date au format rcf2822
	echo date('r')."<br/>";

	//affichage du jour calendaire
	echo "nous sommes le ".date('z')."<sup>e</sup> jour de l'année.<br/>";

	//affichage du timestamp
	echo time()."<br/>";

	echo date('l', strtotime('30 may 1968'))."<br/>";

	$jFerie = array('1 January 2015' ,
					'1 May 2015',
					'8 May 2015',
					'15 August 2015',
					'1 November 2015',
					'11 November 2015',
					'25 Decembre 2015',);

	// tableau des jours de la semaine(dimanche = 0)
	$tJours = array('Dimanche',
					'Lundi',
					'Mardi',
					'Mercredi',
					'Jeudi',
					'Vendredi',
					'Samedi',
					);
//boucle de traitement des jours fériés
	echo"<ul>";
	foreach($jFerie as $dferie)
	{
		$numJour = date("w", strtotime($dferie));
		echo"<li>Le ".$dferie." est un: ".$tJours[$numJour]."</li>";
	}
	echo"</ul>";


$fin= microtime(true);
echo ($fin-$debut)."<br/>";
echo microtime()."<br/>";// affichage microseconde timestamp
echo microtime(true)."<br/>";// affichage timestamp microtime

// timestamp pour la 26 e heure du 14e mois de l'année
$timestamp2 = mktime(16+10,11,00,10+4,01,2015);
echo date('r', $timestamp2)."<br/>";


echo"#######################################################################################################<br/><br/>";
echo"# # #                                         EXERCICE                                            # # #<br/><br/>";
echo"#######################################################################################################<br/><br/>";


$moisF =$arrayName = array(
	'',
	'Janvier' , 
	'Fevrier', 
	'Mars', 
	'Avril', 
	'Mai', 
	'Juin', 
	'Juillet', 
	'Aout', 
	'Septembre' , 
	'Octobre', 
	'Novembre', 
	'Decembre', );

$joursF = array('Dimanche',
					'Lundi',
					'Mardi',
					'Mercredi',
					'Jeudi',
					'Vendredi',
					'Samedi',
					);

//récupération du nom du jour
$nomJour = $joursF[date('w')];
//récupération du nom du mois
$nomMois = $moisF[date('n')];
//récupération du numéro du jour
$numJour2 = date('j');
if($numJour2==1) $numJour2.="<sup>er</sup>";
//année
$annee = date('Y');
//heure
$heure =date('H\hi');
//affichage de la date
echo "Nous sommes le: ". $nomJour." ".$numJour2." ".$nomMois." ".$annee." il est ".$heure."<br/>";
echo getdate();


// inclusion du bas de page
include "includes/footer.php";

?>
