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

	//requête préparée de vérification du login 
	$reqLogin = "SELECT count(*) FROM webforce3.securite 
				 WHERE login=?";
	$curLogin = $dbh->prepare($reqLogin);
	$curLogin->execute(array($login));
	$resultatLogin = $curLogin->fetchColumn();

	// si aucun résultat renvoyé, login invalide
	if($resultatLogin==0)
	{
		//redirection formulaire avec msg login incorrect
		header('location: pdo_form.php?msg=1');
	} 
	// sinon login et mdp retrouvés
	else
	{
		// requête préparée de vérification login/password  
		$reqPassword = "SELECT count(*) FROM webforce3.securite 
				 	    WHERE login=? AND password=PASSWORD(?) ";		
		$curPassword = $dbh->prepare($reqPassword);
		$curPassword->execute(array($login, $pwd));
		$resultatPassword = $curPassword->fetchColumn();

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