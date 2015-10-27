<?php
/************************
*						*
*	COURS SQL ET PDO	*
*	LE 09/10/2015		*
*						*
************************/
$titrePage = 'PDO FETCH';
include "header.php";  //entêtes HTML
include "fonctions.php";
// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'root', 
			   '');

// requête SQL récupération des communes dont le CP est 02500
$req = "SELECT nomCommune as Commune 
		FROM INSEE 
		WHERE codePostal='02500' 
		ORDER BY nomCommune ASC ";

echo '<h2>Liste des communes dont le code postal est 02500:</h2>';
echo '<ul>';

$stmt = $dbh->query($req);
if (!$stmt)
{
   echo "PDO::errorInfo():";
   print_r($dbh->errorInfo());
}
else while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC))
{
	echo '<li>'.$ligne['Commune'].'</li>';
}

echo '</ul>';
// déconnexion
unset($dbh); // ou $dbh = null;

include "footer.php"; //bas de page
?>