<?php
/****************************************
*										*
*	Script d'apprentissage des boucles	*
*	et fonctions utiles en php  		*
*										*
*	Le 01/10/2015						*
*										*
****************************************/

$tNoms = array('Bruno', 'David', 'Sylvain', 'Samuel');

echo "<ul>"; // liste HTML
for($i= 0; $i<=3; $i++) // boucle de 0 à 3
{
	echo "<li>".$tNoms[$i]//."</li>"; // affichage de l'élément d'indice i
}
echo "</ul>"; // Fin de liste HTML
?>
