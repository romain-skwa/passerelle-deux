<?php
       $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');            
       
       if(isset($_GET['id']) AND !empty($_GET['id'])) {
	   $suppr_id = htmlspecialchars($_GET['id']);
	   $suppr = $bdd->prepare('DELETE FROM article WHERE id = ?');
	   $suppr->execute(array($suppr_id));
	}
	else{
		echo "Il y a un probleme. Il semble que id ou title ne soit pas dans l'adresse.";
	}