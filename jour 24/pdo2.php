<?php
/************************
*						*
*	COURS SQL ET PDO	*
*	LE 08/10/2015		*
*						*
************************/
$titrePage = 'SQL et PDO';
include "header.php";  //entêtes HTML
include "fonctions.php";
// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'WF3', 
			   'webforce3');

/*$sql = "SELECT * 
		FROM INSEE 
		WHERE codePostal='02500' 
		ORDER BY nomCommune ASC ";*/
$sql ="SELECT n.date, e.nom, e.prenom, m.libelle, n.note, 
	   n.commentaire, s.nom as ecole 
	   FROM notes n
	   join eleve e 
	   on e.idEleve = n.idEleve 
	   join ecole s 
	   on s.idEcole = e.idEcole
	   join matieres m 
	   on m.idMatiere = n.idMatiere
	   where s.nom = ?
	   ORDER BY e.nom ASC";
$stmt = $dbh->prepare($sql);
$stmt->execute(array('HIRSON'));
$row = $stmt->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau2D($row);

/* AUTRE METHODE D'ECRITURE 
$calories = 150;
$couleur = 'rouge';
$sth = $dbh->prepare('SELECT nom, couleur, calories
    FROM fruit
    WHERE calories < :calories AND couleur = :couleur');
$sth->bindParam(':calories', $calories, PDO::PARAM_INT);
$sth->bindParam(':couleur', $couleur, PDO::PARAM_STR, 12);
$sth->execute();
*/

/*echo "<pre>";
foreach($dbh->query($sql) as $row)
{
	//echo $row['nom']." ".$row['prenom']."<br/>";
	print_r($row);
}
echo "</pre>";

$result = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo afficheTableau2D($result);
//echo '<pre>'.print_r($result, true).'</pre>';
*/
/********************
*					*
* PAUSE DEJEUNER	*
*					*
********************/


//nombre de communes dont le CP est 02500
$req = "SELECT COUNT(nomCommune) FROM INSEE WHERE codePostal='02500'";
$stmt = $dbh->query($req);
// récupération de la première colonne de résultat
$nbCommunes = $stmt->fetchColumn();
// affichage
echo $nbCommunes.' communes possèdent le CP 02500<br/>';

// déconnexion
unset($dbh); // ou $dbh = null;

include "footer.php"; //bas de page
?>