<?php
$titrePage = "Connexion PDO";
include "header.php";

// si le bouton du formulaire a été cliqué
if(isset($_POST['btnSub']))
{
	// connexion PDO_MySQL
	$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=utf8', 
				   'WF3', 
				   'webforce3');
	// 	récupération du login et du mot de passe
	// nettoyage (XSS)
	$login = htmlentities(strip_tags($_POST['login']));
	$pwd = htmlentities(strip_tags($_POST['pwd']));

	//requête de vérification du login avec protection (quote)
	$reqLogin = "SELECT count(*) FROM webforce3.securite 
				 WHERE login=".$dbh->quote($login);

	$resultatLogin = $dbh->query($reqLogin)->fetchColumn();
	// si aucun résultat renvoyé, login invalide
	if($resultatLogin==0)
	{
		//redirection formulaire avec msg login incorrect
		header('location: pdo_form.php?msg=1');
	} 
	// sinon login et mdp retrouvés
	else
	{
		// requête vérification login/password avec protection 
		// contre les injections SQL (quote)
		$reqPassword = "SELECT count(*) FROM webforce3.securite 
				 	    WHERE login=".$dbh->quote($login)." 
				 	    AND password=PASSWORD(".$dbh->quote($pwd).") ";
		$resultatPassword = $dbh->query($reqPassword)->fetchColumn();
		// si aucun résultat renvoyé, mdp invalide
		if($resultatPassword==0)
		{
			//redirection formulaire avec msg password incorrect
			header('location: pdo_form.php?msg=2');
		}
		else echo "Connecté!";
	}

	unset($dbh); //déconnexion
}
include "footer.php";
?>