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
	$login = htmlentities(strip_tags($_POST['login']));

	$pwd = htmlentities(strip_tags($_POST['pwd']));


	$sql = "SELECT count(*) as ok FROM webforce3.securite 
	WHERE login=?";

		$log = $dbh-> prepare($sql);
			   $log->execute (array($login));

		$resultat =$log->fetchColumn();
	

	//$resultat = $dbh->query($sql)->fetchColumn();
	// si aucun résultat renvoyé, login invalide
	if($resultat==0)
	{
		header('location: pdo_form.php?msg=1');
	} 
	// sinon login et mdp retrouvés
	else
	{
	$sql2 = "SELECT count(*) as ok FROM webforce3.securite 
			WHERE login=?
				  and password=PASSWORD(?) ";
		$pass = $dbh-> prepare($sql2);
				$pass->execute (array($login,$pwd));

			$resultat2 =$pass->fetchColumn();
	 
		// si aucun résultat renvoyé, mdp invalide
		if($resultat2==0)
		{
			header('location: pdo_form.php?msg=2');
		}
		else echo "Connecté!";
	}

	unset($dbh); //déconnexion
}
//include "footer.php";
?>
