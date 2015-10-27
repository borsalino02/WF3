<?php

//fonction pour calculer le double
function double($number)
{
	return $number * 2;
}
function triple($number)
{
	return $number * 3;
}
//fonction date en francais
//convertit YYYY-MM-DD en JJ-MM-AAAA
function date_fr($date_us)
{
	$tdate = explode("-", $date_us);
	return $tdate[2]."/".$tdate[1]."/".$tdate[0];
}

//fonction date US
//convertit JJ/MM/AAAA en YYYY-MM-DD
function date_us($date_fr)
{
	$tdate = explode("/", $date_fr);
	return $tdate[2]."-".$tdate[1]."-".$tdate[0];
}

function afficheTableau($tableau)
{
	$retour = '<table>';
//echo'<table><tr><th>Language</th><th>Age</th></tr>';
foreach($tableau as $cle => $language)// pour la premiére dimension
{
	if($cle==0)//sur le premier enregistrement
	{
		$retour.='<tr>';
		foreach($language as $entete => $rien)//on a besoin de l'entête uniquement
		{
			$retour.="<th>".$entete."</th>";// afiichage d'une colonne du tableau
		}
		$retour.='</tr>';
	}//fermeture de la ligne
	
	$retour.="<tr>";
	foreach($language as $valeur)
	{
		$class = '';
		//si valeur numérique on ajoute la classe css nombre pour aligner a droite
		if(is_numeric($valeur)) $class = ' class="nombre" ';
		$retour.="<td ".$class.">".$valeur."</td>";//boucle pour la 2éme dimension
	}
	$retour.='</tr>';
}
$retour.='</table>';
return $retour;
}

//fonction pair
function pair($number)
{
	return !($number & 1);
}
// fonction impair
function impair($number)
{
	return($number & 1);
}
//function inconnu()
function inconnu($element){
//renvoie 1 si createur =='inconnu'
return $element['createur'] == 'inconnu';

}

// fonction cube
function cube($nb)
{
	return ($nb * $nb * $nb);
}
function divers($tableau)
{
	$new =array(); //on crée un tableau temporaire
	$new['language'] = $tableau['language'];// ajout des zones existantes
	$new['age'] =$tableau['age'];
	$new['createur']=$tableau['createur'];
	$new['Divers'] = mt_rand(0,100);// ajout d'une nouvelle zone
	return $new; // on renvoie le tableau
}
?>