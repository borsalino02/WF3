<?php
//Connexion PDO
// si le bouton du formulaire a été cliqué
if(isset($_POST['btnSub']))
{
	// connexion PDO_MySQL
$dbh = new PDO('mysql:host=localhost;dbname=noteforce3;charset=utf8', 
           'WF3', 
           'webforce3');
	// 	récupération du login et du mot de passe
	/*$dsn = "mysql:host=localhost;dbname=noteforce3;charset=utf8";*/
	$loginPersonne = htmlentities(strip_tags($_POST['loginPersonne']));
	$passPersonne = htmlentities(strip_tags($_POST['passPersonne']));
	$typePersonne = $_POST['typePersonne'];
	$dbh = new PDO($dsn, $loginPersonne, $passPersonne, $typePersonne);

$reqLogin = "SELECT count(*) FROM personnes 
  			   WHERE loginPersonne = ?";
 $curseurLogin = $dbh->prepare($reqLogin);
 $curseurLogin->execute(array($loginPersonne));
 $resultatLogin = $curseurLogin->fetchColumn();
 	if($resultatLogin==0)
  	{
  		header('location: connexion.php?msg=login incorrect');
  	}

  		else
  		{
  		$reqPass = "SELECT count(*) FROM personnes 
  			   WHERE login = ? AND password = PASSWORD(?)";
    	$curseurPass = $dbh->prepare($reqPass);
    	$curseurPass->execute(array($loginPersonne, $passPersonne));
    	$resultatPass = $curseurPass->fetchColumn();
    		if($resultatPass==0)
    		{
    		header('location: connexion.php?msg=mot de passe incorrect');
    }
      else
    {
    	$reqType ="SELECT count(*) FROM personnes
    			WHERE login = ? AND password = PASSWORD(?) AND typePersonne= ?";
    $curseurType = $dbh->prepare($reqType);
    $curseurType->execute(array($loginPersonne, $passPersonne, $typePersonne));
    $resultatType=$curseurType->fetchColumn();
    if($resultatType==0)
    {
    	header('location: connexion.php?msg=type incorrect');
    }
    else echo "Connecté!";
	}

	unset($dbh); //déconnexion
}
include "footer.php"
?>