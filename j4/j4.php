<?php

include "header.php";


$tableau = array(array('language'=>'PHP',
						'age'=>21,
						'createur'=> 'Rasmus Ledorf'),
				array('language'=>'JAVA',
						'age'=>33,
						'createur'=> 'SUN'),
				array('language'=>'C#',
						'age'=>14,
						'createur'=> 'Microsoft'),
				array('language'=>'COBOL',
						'age'=>56,
						'createur'=> 'IBM'),
				array('language'=>'BASIC',
						'age'=>51,
						'createur'=> 'inconnu'),
				array('language'=>'C',
						'age'=>45,
						'createur'=> 'inconnu'),
				array('language'=>'C++',
						'age'=>32,
						'createur'=> 'toto'),
				);
echo '<table>';
//echo'<table><tr><th>Language</th><th>Age</th></tr>';
foreach($tableau as $cle => $language)// pour la premiére dimension
{
	if($cle==0)//sur le premier enregistrement
	{
		echo'<tr>';
		foreach($language as $entete => $rien)//on a besoin de l'entête uniquement
		{
			echo"<th>".$entete."</th>";// afiichage d'une colonne du tableau
		}
		echo'</tr>';
	}//fermeture de la ligne
	
	echo"<tr>";
	foreach($language as $valeur)
	{
		$class = '';
		//si valeur numérique on ajoute la classe css nombre pour aligner a droite
		if(is_numeric($valeur)) $class = ' class="nombre" ';
		echo"<td ".$class.">".$valeur."</td>";//boucle pour la 2éme dimension
	}
	echo'</tr>';
}
echo '</table>';


include "footer.php";
?>