<?php 

$donneesRetour = array(
	"auteur" => $_POST['auteur'],
	"message" => $_POST['message'],
	"date" => date('\l\e d/m/y \à H\hi')
);

echo json_encode($donneesRetour);

 ?>