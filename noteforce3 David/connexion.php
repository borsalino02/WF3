<!DOCTYPE html>
<html>
<head>
	<title>Formulaire PDO</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="includes/fonction."></script>
	<meta charset="utf-8">
</head>
<body>
 <?php
if(isset($_GET['msg'])) echo '<p class=>"message'.$_GET['msg'].'</p>';
 ?>
  <form method="post" action="includes/loginPDO.php">
    <p><label for="loginPersonne">Login:</label>
    <input type="text" name="login"></p>
    <p><label for="passPersonne">Mot de Passe:</label>
    <input type="password" name="pwd"></p>
    <select name="typePersonne">
			<option value="1">Eleve</option>
			<option value="2">Formateur</option>
			<option value="3">Administrateur</option>
    <input type="submit" name="btnSub" value="Connexion" id="btnSub">
  </form>
</body>
</html>