<?php
/*$titrePage = "Connexion PDO";
include "header.php";*/

// si le bouton du formulaire a été cliqué
if(isset($_POST['btnSub']))
{
	// connexion PDO_MySQL
	$dbh = new PDO('mysql:host=localhost;dbname=webforce3;charset=utf8', 
				   'root', 
				   '');
	// 	récupération du login et du mot de passe
	$login = $_POST['login'];
	$pwd = $_POST['pwd'];


	$sql = "SELECT count(*) as ok FROM webforce3.securite 
	WHERE login='".$login."'";

	$resultatLogin = $dbh->query($sql)->fetchColumn();
	// si aucun résultat renvoyé, login invalide
	if($resultatLogin==0)
	{
		header('location: pdo_form.php?msg=1');
	} 
	// sinon login et mdp retrouvés
	else
	{
		$sql2 = "SELECT count(*) as ok FROM webforce3.securite 
				 WHERE login='".$login."' and password=PASSWORD('".$pwd."') ";
		$resultatPassword = $dbh->query($sql2)->fetchColumn();
		// si aucun résultat renvoyé, mdp invalide
		if($resultatPassword==0)
		{
			header('location: pdo_form.php?msg=2');
		}
		else echo "Connecté!";
	}

	unset($dbh); //déconnexion
}
//include "footer.php";
?>