<?php
// vérification si bouton cliqué
if(isset($_POST['btnSub']))
{
	// récupération du login et du mot de passe saisi
	$login = htmlentities(strip_tags($_POST['utilisateur']));
	$pwd = htmlentities(strip_tags($_POST['motDePasse']));

	//connexion PDO
	// on pourrait mettre les infos de connexion dans un fichier
	// et faire un include pour ganer du temps et faliciter la maintenance
	$dsn = "mysql:host=localhost;dbname=webforce3;charset=utf8";
	$bddUser = "root";
	$bddPass= "";
	$dbh = new PDO($dsn, $bddUser, $bddPass);

	// vérification du login
	$reqLogin ="SELECT id from webforce3.securite 
				where login = ?";
	$curseurLogin = $dbh->prepare($reqLogin);
	$curseurLogin->execute(array($login));
	$resultatLogin=$curseurLogin->fetchColumn();
	// si pas de resultat...
	//var_dump($resultatLogin);
	if($resultatLogin=== false)
	{
		header('location: form_revision.php?msg=login incorrect');
	}
	// sinon login connu
	else
	{
		$reqPass="SELECT id from webforce3.securite 
				where login = ? and password= PASSWORD(?)";
		$curseurPass = $dbh->prepare($reqPass);
		$curseurPass->execute(array($login,$pwd));
		$resultatPass = $curseurPass->fetchColumn();
		if($resultatPass===false)
		{
			header('location: form_revision.php?msg=mot de passe incorrect');
		}
		else
		{
			echo"Connexion établie!<br/> BRAVO!";
		}
		//deconnexio
		unset($dbh);
	}
}

?>