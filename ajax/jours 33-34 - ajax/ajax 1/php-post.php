<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Php</title>
</head>
<body>

<!-- en POST, les données du formulaire ne sont pas visibles dans l'URL -->

<form method="POST" action="">
	<label>Comment t'appelles-tu ?</label>
	<input name="prenom" type="text">
	<button>Bonjour</button>
</form>
<p id="reponse"> 
<?php 

	if (isset($_POST['prenom'])) {
		echo "Comment vas-tu " . htmlentities(strip_tags($_POST['prenom'])) . " ?";
	}

 ?>
</p>
</body>
</html>