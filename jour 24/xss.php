<?php
    // protection contre les attaques XSS.
	// Ne jamais faire confiance à l'utilisateur!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    echo htmlentities(strip_tags($_POST['recherche']));
    echo htmlspecialchars('<script>');
?>