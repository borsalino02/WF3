<?php
/********************************************************************************
*																				*
* le 06/10/2015																	*
*révisions php 																	*
********************************************************************************/

$tableau = array( array('Nom' => 'ANTOINE Sylvain','Francais' =>mt_rand(0,20), 'Math' =>mt_rand(0,20)),
				  array('Nom' => 'ARCOLE David','Francais' =>mt_rand(0,20), 'Math' =>mt_rand(0,20)),
				  array('Nom' => 'BESANCON JB','Francais' =>mt_rand(0,20), 'Math' =>mt_rand(0,20)),
				  array('Nom' => 'CHERFI Ali','Francais' =>mt_rand(0,20), 'Math' =>mt_rand(0,20))
	);
//affichage brut du tableau
echo"<pre>";
print_r($tableau);
echo"</pre>";
//moyenne pour les maths
$moyMath = 0;

//moyenne pour le francais
$moyFrancais = 0;

function couleurCell ($nb) {
	if(is_numeric($nb))
	{
	if($nb < 10) 
	return '<td bgcolor="red">'.$nb.'</td>';
	else if($nb == 10)
	return '<td bgcolor="orange">'.$nb.'</td>';
	else
	return '<td bgcolor="green">'.$nb.'</td>';
	}
	else
	return '<td>'.$nb.'</td>';
}


//premiére boucle
echo "<table><tr><th>Nom</th><th>Francais</th><th>Math</th><th>Moyenne</th></tr>";
$nbElem = count($tableau);
for ($i=0; $i < $nbElem ; $i++)
{ 
	echo"<tr>";
	// pour la moyenne de l'éléve
	$moyenne = 0;
	//boucle intérieur
	foreach($tableau[$i] as $cle => $elem)
	{	
		echo couleurCell($elem);

		if($cle=='Francais')
		{
			$moyenne += $elem;
			$moyFrancais += $elem;
		}
		else if($cle=='Math')
		{
			$moyenne += $elem;
			$moyMath += $elem;
		}
	}
	// on calcul la moyenne en la divisant lla somme des moyenne de l'éléve par le nombre de matiéres
	
	echo couleurCell($moyenne/(count($tableau[$i])-1));
	echo"</tr>";
}
$totalfrancais = couleurCell(round($moyFrancais/$nbElem,2));
$totalmath = couleurCell(round($moyMath/$nbElem,2));
$totalGeneral = couleurCell(round(($totalfrancais+$totalmath)/2,2));

// on ajoute un espace insécable'&nbsp;' dans le tableau pour un affichage correct
echo"<tr><td><strong>Moyenne</strong></td>";
echo $totalfrancais.$totalmath.$totalGeneral."</tr>";
echo "</table>";
?>
