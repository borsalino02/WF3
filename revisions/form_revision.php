<?php
/********************************
*								*
*	Formulaire login/paswword 	*
*								*	
********************************/
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulaire</title>
		<metacharset = "utf-8">
		<script type="text/javascript" src="js/veriformlogin.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	<?php
		if(isset($_GET['msg'])) echo "<p class='message'>".$_GET['msg'].'</p>';

	?>
	<form method= "post" action="revision.php" onsubmit="return verif(this);">
	
	<p><label><span>Login : </span><input type="text" name="utilisateur"></label></p>
		
	
	<p><label><span>Mot de passe: </span><input type="password" name="motDePasse"></label></p>
		
		
	
	<p><input type="submit" name="btnSub" value="go!" id="btnSub" ></p>
		
	
	</form>
	</body>
</html>