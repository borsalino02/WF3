<?php
$titrePage = "Connexion PDO";
include "header.php";
include "fonctions.php";
$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=UTF8', 
			   'root', 
			   '');

$rq = "SELECT nomcommune from INSEE WHERE codepostal='02600'";
$stmt = $dbh-> query($rq);
while($row = $stmt ->fetch(PDO::FETCH_ASSOC))
{
	echo $row['nomcommune']."<br>";
}

//tableau fetchAll

$rq ="SELECT notes.date, eleve.nom, eleve.prenom, matiere.nom_matiere, notes.note, 
	   notes.commentaire,  ecole.nom_ecole 
	   FROM notes 
	   join eleve  
	   on eleve.id_eleve = notes.id_eleve 
	   join ecole  
	   on ecole.idEcole = eleve.idEcole
	   join matiere 
	   on matiere.id_matiere = notes.id_matiere
	   where ecole.nom_ecole = ?
	   ORDER BY eleve.nom ASC";
$stmt = $dbh-> prepare($rq);
	   $stmt->execute(array('Hirson'));
	   $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
	   echo"<pre>";
	   print_r($row);
	   echo"<pre>";
	   /*
echo"<pre>";
foreach($dbh->query($rq)as $row)
{
	print_r($row);
}
echo"</pre>";
$notes = $dbh->query($rq)->fetchAll(PDO::FETCH_ASSOC);
echo afficheTableau2D($notes);

$rq2 = "SELECT * from INSEE WHERE codepostal='02300'";
$result = $dbh->query($rq2)->fetchAll(PDO::FETCH_ASSOC);
echo"<pre>";
print_r($result);
echo"</pre>";

// fetch column

$rq3="select count(nomcommune) from INSEE WHERE codepostal='02300'";
$result2=$dbh->query($rq3);
$nbCommunes=$result2->fetchColumn();
echo $nbCommunes."<br/>";*/


	unset($dbh); //déconnexion


//nclude "footer.php";
?>