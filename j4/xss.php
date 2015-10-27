<?php
//protection contre les attaques XSS
//ne jamais faire confiance à l'utilisateur!!!!!!!!!!!!!!

	echo htmlentities(strip_tags($_POST['recherche']));
?>