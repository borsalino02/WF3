<?php
$titrePage="Pagination";
include "includes/header.php";
// parametre de configuration
include "includes/param.inc.php";
// connexion mysql
include "includes/connexion.php";
// pour l'affichage du tableau HTML
include "includes/fonction.php";

// toujours protéger les infos envoyées par l'URI ou par formulaire
if(isset($_GET['page'])) $page=htmlentities(strip_tags($_GET['page']));
else $page=1;
echo 'PageN°'.$page."<br/>";

$parPage=25;
$debut= $parPage * ($page -1);
// page 1 on doit aller de 0 à 10
// page 2 on doit aller de 10 à 20
// page 3 on doit aller de 20 à 30
// et caetera

$req="SELECT codeinsee AS Insee, nomcommune as Commune, codepostal as CP, libelle as libelle FROM insee LIMIT ".$debut.','.$parPage;
//echo $req.'<br/>';

$stmt = $dbh->query($req)->fetchALL(PDO::FETCH_ASSOC);
echo afficheTableau($stmt);

if($page>1)
	{
		// lien pour la page précédente
		echo'<button onclick="document.location.href=\'pagination.php?page='.($page-1).'\';">&lt;&lt,</button> -';
	}
	//lien pour la page suivante
	echo'<button onclick="document.location.href=\'pagination.php?page='.($page+1).'\';">&gt;&gt;</button>';
include "includes/footer.php";
?>