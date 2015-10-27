<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Php GET</title>
</head>
<body>

<!-- en GET, les données du formulaire sont visibles dans l'URL (barre d'adresse) -->

<form method="GET" action="">
	<label>Comment t'appelles-tu ?</label>
	<input name="prenom" type="text">
	<button>Bonjour</button>
</form>
<p id="reponse"> 
<?php 

	if (isset($_GET['prenom'])) {
		echo "Comment vas-tu " . htmlentities(strip_tags($_GET['prenom'])) . " ?";
	}

 ?>
</p>
</body>
</html>