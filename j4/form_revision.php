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
		<script type="text/javascript" src="ja/veriformlogin.js"></script>
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
	<?php
		if(isset($_GET['msg'])) echo "<p>".$_GET['msg'].'</p>';

	?>
	<form method= "post" action="revision.php" onsubmit="return verif(this);">
	<p>
		<label>Login : </label>
		<input type="text" name="utilisateur">
	</p>
	<p>
		<label>Mot de passe: </label>
		<input type="password" name="motDePasse">
	</p>
	<p>
		<input type="submit" name="btnSub" value="go!" onclick="verif(this);">
	</p>
	</form>
	</body>
</html>