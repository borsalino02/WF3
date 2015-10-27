<?php 
	$date = date("d-m-Y");
	$heure = date("H:i");
	echo"<span>Message de : ".$_POST['nom']."</span><p>Corps du message : ".$_POST['message']."</p><time>date :".$date." heure :".$heure."</time>";
 
 ?>