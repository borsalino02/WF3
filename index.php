<!DOCTYPE html>
<?php
/****************************************
*										*
* ce script ne sert a rien 				*
* développé par 						*
* le 									*
****************************************/
?>
<html>
<head>
	<title>ma premiere page PHP</title>
</head>
<body>
	<?php
	echo "<h1>Hello WF3 !</h1>"; 
	$string = "<p>ceci est un essai</p>";
	$maVariableQuiNeSertARien ="test";
	$Nombre = 12;//integer
	$Nombre*=2;// équivalent a $Nombre= $Nombre * 2 ;
	$retourLigne = "<p></p>";
	$decimal = 12.5;//float
	$fResultat = $Nombre + $decimal;//nombre + decimal
	$fResultat2 = $string + $Nombre;//chaine + integer
	$fruits = array (// tableau de fruits suivi d'un tableau de nombre
    "a" => "orange", "b" => "banane", "c" => "pomme"
     );
	$bEtat = true;//boolean
	echo $string;
	echo $retourLigne;
	echo $Nombre;
	echo $retourLigne;
	echo $decimal;
	echo $bEtat;
	echo $retourLigne;
	echo $fResultat.$retourLigne;
	echo $fResultat2.$retourLigne;
	echo $retourLigne;
	echo "<pre>";
	print_r($fruits);//print_r () affiche les tableaux et les objets
	echo "</pre>";// la balise <pre> permet le formatage du tableau
	echo $fruits["a"].$retourLigne; //affiche le premier enregistrement du tableau
	echo $retourLigne;
	var_dump($bEtat);//var_dump () affiche les données et leur type
	echo $retourLigne;
	echo $Nombre ++ . $retourLigne;//incremente apres l'affichage
	echo $Nombre ++ . $retourLigne;
	echo ++$Nombre. $retourLigne;// incremente avant l'affichage
	echo "le nombe vaut: $Nombre".$retourLigne;
	echo 'le nombe vaut: $Nombre'.$retourLigne;
	echo 'le nombe vaut: '.$Nombre.$retourLigne;
	echo '<script type = "text/javascript">alert("Bonjour");</script>';

	$note = rand(0,20);// nombre aléatoire entre 0 et 10
	echo $note;
	echo $retourLigne;
	if ($note == 0)
		echo '<img src="images/Cnul.jpg" alt="c est nul!!!!!" />';
	else 
		if ($note<=10) 
	{
		echo '<img src="images/pasbien.jpg" alt="peut mieux faire" />';
	}
	else
	{
		echo '<img src="images/bien.jpg" alt=\"youpeee\" />';
	}
	echo $retourLigne;
	switch($note)
	{
		case 0 : $appreciation ="c'est nul !!!!!!! !";
			break;
		case 1 :
		case 2 :
		case 3 :
		case 4 : $appreciation ="Etes vous venu en cours ?";
			break;
		case 5 :
		case 6 :
		case 7 :
		case 8 :
		case 9 : $appreciation ="En progrés";
		break;
		case 10 : $appreciation ="c'était limite !";
			break;
		case 11 :
		case 12 :
		case 13 :
		case 14 : $appreciation ="belle progression !";
			break;
		case 15 :
		case 16 :
		case 17 :
		case 18 :
		case 19 : $appreciation ="presque parfait!";
		break;
		default : $appreciation="BRAVO!!! Faites votre choix";
		}

	echo $appreciation;
	?>
</body>
</html>