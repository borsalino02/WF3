<?php
$titrePage ="Résultat googleForce3";
require_once "includes/connexion.php";
include "includes/header.php";

if(isset($_GET['page'])) $page=htmlentities(strip_tags($_GET['page']));
else $page=1;

$parPage=10;
$debut= $parPage * ($page -1);

// récuperation de l'info a chercher
$motCle= htmlentities(strip_tags($_GET['search']));
$critereRecherche = htmlentities(strip_tags($_GET['critereRecherche']));
// connexion BDD

//recuperation du nombre de pages
$requeteNbPages="SELECT count(*) 
		FROM webforce3.insee 
		WHERE ". $critereRecherche." LIKE ?";
$curseurNbPages = $dbh->prepare($requeteNbPages);
$curseurNbPages->execute(array('%'.$motCle.'%'));
$resultatNbPages = $curseurNbPages->fetchColumn();
echo $resultatNbPages."<br/>";
$nombreDePages = ceil($resultatNbPages/$parPage);



// recuperation du résultat de la recherche
$requete="SELECT * 
		FROM webforce3.insee 
		WHERE ". $critereRecherche." LIKE ?
		LIMIT ".$debut.", ".$parPage;
// exécution de la requéte
$curseur = $dbh->prepare($requete);
$curseur->execute(array('%'.$motCle.'%'));
$resultatRecherche = $curseur->fetchALL(PDO::FETCH_ASSOC);
$nbLigne = count($resultatRecherche);

	if($page>1)
	{
		// lien pour la page précédente
		echo'<button onclick="document.location.href=\'recherche.php?critereRecherche='.$_GET['critereRecherche'].'&page='.
		
		($page-1).'&search='.$_GET['search'].'\';">&lt;&lt;</button>';
	}
	//lien pour la page suivante
	if(($nbLigne == $parPage) && ($page < $nombreDePages))
	{
		echo'<button onclick="document.location.href=\'recherche.php?critereRecherche='.$_GET['critereRecherche'].'&page='.
		($page+1).'&search='.$_GET['search'].'\';">&gt;&gt;</button>';
	}
// pour l'affichage du tableau
include "fonctions.php";
echo afficheTableau2D($resultatRecherche);
echo"page ".$page."sur ".$nombreDePages."<br/>";
echo'<a href="googleforce3.php">Autre recherche</a>';

include "includes/footer.php";
?>