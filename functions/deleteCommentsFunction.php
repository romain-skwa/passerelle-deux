<?php
       $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');            
       
       if(isset($_GET['id']) AND !empty($_GET['id'])) {
	   $suppr_id = htmlspecialchars($_GET['id']);
	   $suppr = $bdd->prepare('DELETE FROM commentaries WHERE id = ?');
	   $suppr->execute(array($suppr_id));
	}
	else{
		echo "Il y a un probleme. Il semble que le id de ce commentaire ne soit pas dans l'adresse.";
	}