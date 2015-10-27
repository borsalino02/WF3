<?php

include "header.php";
//echo get_include_path();

include "fonctionj4bis.php";
echo double(5).'<br>';
echo triple(10).'<br>';
echo double(triple(46)).'<br>';
$dateJour = date('Y-m-d');
echo date_fr($dateJour)."<br>";
echo date_us('05/10/2015')."<br>";

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
echo afficheTableau($tableau)."<br>";


$tnombres = array(1,2,3,4,5,6,7,8,9,10);
echo '<pre>';
//affichage des nombres pairs
print_r(array_filter($tnombres, 'pair'));
	$tresultat =array();
	foreach($tnombres as $nombre)
	{
		if(pair($nombre)) $tresultat[]= $nombre;
	}
// affichage des nombres impairs
print_r(array_filter($tnombres, 'impair'));
// tri des éléments dont le créateur est inconnu
print_r(array_filter($tableau, 'inconnu'));

// calculs sur le tableau
print_r(array_map('cube', $tnombres));

// ajout d'une zone divers dans le tableau
print_r(array_map('divers', $tableau));
echo afficheTableau(array_map('divers',$tableau));

echo '</pre>';


include "footer.php";
?>