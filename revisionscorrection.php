<?php
/****************************************
*										*
*	Le 06/10/2015						*
*	Révisions PHP 						*
*	- Tableaux 2D						*
*	- boucles							*
*										*
****************************************/

$tableau = array( array('Nom'=>'ANTOINE Sylvain', 'Francais'=>mt_rand(0,20), 'Maths'=>mt_rand(0,20), "Info"=>mt_rand(0,20)),
				  array('Nom'=>'ARCOLE David', 'Francais'=>mt_rand(0,20), 'Maths'=>mt_rand(0,20), "Info"=>mt_rand(0,20)),
				  array('Nom'=>'BESANCON JB', 'Francais'=>mt_rand(0,20), 'Maths'=>mt_rand(0,20), "Info"=>mt_rand(0,20)),
  				  array('Nom'=>'CHERFI Ali', 'Francais'=>mt_rand(0,20), 'Maths'=>mt_rand(0,20), "Info"=>mt_rand(0,20)),
		   );
// affichage brut du tableau (débugage)
echo "<pre>";
print_r($tableau);
echo "</pre>";

//la fonction getlogin retourne un login à partir du nom
//login:
// - tout en majuscules
// - premiére lettre du prénom
// - 3 premiéres lettres du nom

function getlogin($nom)
{
	$login='';
	//on crée un tableau à partir du nom complet
	$tNom = explode(' ',$nom);
	//$tNom[0] contient le Nom de famille
	//$tNom[1] contient le prénom
$login = substr($tNom[1],0,1). substr($tNom[0],0,3);
	//on transforme tout en majuscule
	return strtoupper ($login);
}

// fonction qui retourne une couleur 
// en fonction de la note
function getCouleur($nb)
{
	// si chaine de caractère on zappe
	if(is_string($nb)) return false;
	$couleur = '';
	
	if($nb<5) $couleur = '#FF6060'; //rouge
	else if($nb>=5 && $nb<10) $couleur = '#FE9A2E'; //orange 
	else if($nb>10 AND $nb<15) $couleur = '#2ECCFA'; //bleu
	else if($nb==10) $couleur = '#FFFFFF'; //blanc
	else $couleur = '#80FF00'; //vert

/*
	switch($nb)
	{
		case 0: 
		case 1:
		case 2:
		case 3:
		case 4:  $couleur = '#FF6060'; //rouge
		         break;
		case 5:  
		case 6:
		case 7:
		case 8:
		case 9: $couleur = '#FE9A2E'; //orange
				break;
		case 10: $couleur = '#FFFFFF'; //white;
		case 11:
		case 12:
		case 13:
		case 14:
		case 15: $couleur = '#2ECCFA'; //bleu	
				 break;
		default: $couleur = '#80FF00'; //vert
	}*/
	
	return $couleur;
}


//moyenne pour les Maths
$moyMaths = 0;

// moyenne pour le français
$moyFrancais = 0;
// moyenne pour l'informatique
$moyInfo = 0;

// entête HTML du tableau
echo "<table>
	   <tr>
	     <th>Nom</th>
	     <th>Français</th>
	     <th>Maths</th>
	     <th>Info</th>
	     <th>Moyenne</th>
	   </tr>";
// première boucle
$nbElem = count($tableau);
for($i=0;$i<$nbElem; $i++)
{
	echo "<tr>";
	// pour la moyenne de l'élève
	$moyenne = 0;
	// boucle intérieure
	foreach($tableau[$i] as $cle=>$elem)
	{
		if($cle=='Nom') echo '<td>'.$elem.'</td>
							  <td>'.getlogin($elem).'</td>';
		else echo '<td bgcolor="'.getCouleur($elem).'">'.$elem."</td>";
		
		//calcul des moyennes
		switch($cle)
		{
			case 'Francais': $moyenne = $moyenne + $elem;
							 $moyFrancais += $elem; //idem ligne du dessus
							 break;
			case 'Maths': 	 $moyenne = $moyenne + $elem;
							 $moyMaths += $elem; //idem ligne du dessus
							 break;
			case 'Info':	 $moyenne = $moyenne + $elem;
							 $moyInfo += $elem; //idem ligne du dessus
							 break;				
		}
/*
		// moyennes pour le français
		if($cle=='Francais')
		{
			$moyenne = $moyenne + $elem;
			$moyFrancais += $elem; //idem ligne du dessus
		}
		// moyennes pour les maths
		else if($cle=='Maths')
		{
			$moyenne += $elem;
			$moyMaths += $elem; //idem ligne du dessus
		}
		// moyennes pour les maths
		else if($cle=='Info')
		{
			$moyenne += $elem;
			$moyInfo += $elem; //idem ligne du dessus
		}*/

	}
	// on calcule la moyenne en divisant la somme des moyennes
	// de l'élève par le nombre de matières 
	// round($nb, 2) arrondit $nb a deux chiffres après la virgule
	$moyLigne = round($moyenne/(count($tableau[$i])-1),2);
	echo '<td bgcolor="'.getCouleur($moyLigne).'">'.$moyLigne."</td>";
	echo "</tr>";
}
// moyenne de Français,de Maths et d'info arrondies à deux chiffres
$totalFrancais = round($moyFrancais/$nbElem, 2);
$totalMaths = round($moyMaths/$nbElem, 2);
$totalInfo = round($moyInfo/$nbElem, 2);

//moyenne gélérale de la classe
$totalGeneral = round(($totalFrancais + $totalMaths)/2,2);
// affichage des moyennes
echo "<tr><td colspan=2><strong>Moyenne</strong></td>";
echo '<td  bgcolor="'.getCouleur($totalFrancais).'">'.$totalFrancais.'</td>
	  <td bgcolor="'.getCouleur($totalMaths).'">'.$totalMaths.'</td>
	  <td bgcolor="'.getCouleur($totalInfo).'">'.$totalInfo.'</td>
	  <td bgcolor="'.getCouleur($totalGeneral).'">'.$totalGeneral.'</td></tr>';
echo "</table>";


echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>