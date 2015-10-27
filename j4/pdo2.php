<?php
/************************
*						*
*	COURS SQL ET PDO	*
*	LE 08/10/2015		*
*						*
************************/
$titrePage = 'SQL et PDO';
include "header.php";  //entêtes HTML

// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'root', 
			   '');

//$sql = "select nom, prenom from eleve where idEleve > 1 and idEleve < 10 ";
$sql ="SELECT n.date, e.nom, e.prenom, m.libelle, n.note, 
	   n.commentaire,  s.nom 
	   FROM notes n
	   join eleve e 
	   on e.idEleve = n.idEleve 
	   join ecole s 
	   on s.idEcole = e.idEcole
	   join matieres m 
	   on m.idMatiere = n.idMatiere
	   where s.nom = ?
	   ORDER BY e.nom ASC";
echo "<pre>";
foreach($dbh->query($sql) as $row)
{
	//echo $row['nom']." ".$row['prenom']."<br/>";
	print_r($row);
}
echo "</pre>";

// déconnexion
unset($dbh); // ou $dbh = null;

include "footer.php"; //bas de page
?>