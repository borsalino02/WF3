<!DOCTYPE html>
<html>
<head>
	<title>boucles et fonctions utiles</title>
</head>
<body>
<?php

// LES BOUCLES

	for ($i = 0; $i <= 10; $i ++)
		{
		echo $i."<br/>";
		}

	$i = 0
	while($i <= 10)
			{
			echo $i++."<br/>";
			}

	$u = 0;
	do
	{
		echo $u++."<br/>";
	}
	while($u <= 10);

// FONCTIONS
	$tMarques = array('peugeot', 'renault', 'dacia', 'citroen', 'seat', 'lada', 'skoda', 'vw', 'audi', 'land rover');
	echo count($tMarques).'<br/>';
	echo"<ul>";
	foreach($tMarques as $marque)
	{
		echo"<li>".$marque.'</li>';

	}
	echo "</ul>";

	$tuser = array('nom'=>'ARCOLE', 'prenom'=>'David');
	echo $tuser['nom'];
	echo"<ul>"
	foreach($tuser as $index=>$marque)
		{echo"<li><strong>".$index."</strong>: ".$marque.'</li>';
	}
	echo"</ul>";
?>
</body>
</html>