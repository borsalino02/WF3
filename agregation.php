<?php
// titre et entete HTML
$titrePage = "agrégation SQL";
include "includes/header.php";
include "includes/fonction.php";

//connexion BDD
require_once "includes/connexion.php";

// requéte
$requete ="SELECT count(*)
			from webforce3.insee 
			where codePostal like '02%'";
//execution de la requete
$curseur = $dbh->query($requete);
//affichage du resultat
// (fetchColupmn renvoie la valeur de la premiere colonne)
echo $curseur->fetchColumn()."<br/>";
echo'<hr/>';

$requete2 ="SELECT avg(note)
			from webforce3.notes
			where id_eleve = 1";
$curseur2 = $dbh->query($requete2);
echo $curseur2->fetchColumn()."<br/>";
echo'<hr/>';

$requete3 ="SELECT count(*), min(codeinsee), max(codeinsee), codepostal
		FROM webforce3.insee
		WHERE codepostal
		LIKE '025%'
		GROUP BY codepostal";
$curseur3= $dbh->query($requete3)->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau($curseur3);
echo'<hr/>';

$requete4= "SELECT avg(n.note) as moyenne, e.nom, e.prenom
			FROM webforce3.notes n
			JOIN webforce3.eleve e
			ON n.id_eleve = e.id_eleve
			GROUP BY n.id_eleve";
$curseur4= $dbh->query($requete4)->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau($curseur4);
echo'<hr/>';

$requete5= "SELECT avg(n.note) as moyenne, m.nom_matiere as matiere
			FROM webforce3.notes n
			JOIN webforce3.matiere m
			ON n.id_matiere = m.id_matiere
			GROUP BY n.id_matiere";
$curseur5= $dbh->query($requete5)->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau($curseur5);
echo'<hr/>';

//bas de page
include "includes/footer.php";
?>