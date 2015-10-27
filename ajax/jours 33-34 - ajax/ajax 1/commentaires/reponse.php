<?php
	/* on récupère la date du jour, formatée "jour-mois-année" */
	$date = date('d-m-y');
	$heure = date('H:i');
?>

<span><?php echo $_POST['auteur']; ?></span>
<time><?php echo date('\l\e d/m/y \à H\hi'); ?></time>
<p><?php echo $_POST['message']; ?></p>
<!-- <time><?php echo $date.' '.$heure; ?></time> -->





<!-- 

{
	"auteur": "Lulu",
	"date": "le 24/10/2015 à 14h30",
	"message": "Salut"
}

 -->