<?php
    /*
    Cette page  est l'addition de checkFirst.php et de checkUser.php.
    Je l'ai crée pour changer la redirection (ligne 45) et envoyer vers la page
    */
	if(!empty($_POST['username']) && !empty($_POST['password']) === time_nanosleep(0,5000)) {

          // Connexion à la bdd
          try{
              $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
            }
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage());
            }	
            
            // Variables
            $username    = htmlspecialchars($_POST['username']);
            $password    = htmlspecialchars($_POST['password']);
            var_dump($username);
            
            // Chiffrement du mot de passe.
            $password = "ebi".sha1($password."byx")."poa845";
            
            // L'identifiant est-il celui du webmaster ?
            // Ici, nous vérifions dans la table appelée "webmaster"
            $web = $bdd->prepare('SELECT COUNT(*) as isThereWeb FROM webmaster WHERE username = ?');
            $web->execute([$username]);
            
            while($master = $web->fetch()) {
                // Si cette condition est remplie, l'identifiant est celui du webmaster
                if($master['isThereWeb'] == 1){
                    (header('location: index.php?webmaster=true&message=Vous êtes le webmaster oui oui'));
                    exit();
                }
                else{
                            // L'identifiant est-il dans la base de donnée ?
                        //Ici, nous vérifions la talbe appelée "user"
                        $req = $bdd->prepare('SELECT COUNT(*) as isThere FROM user WHERE username = ?');
                        $req->execute([$username]);
                        $nombreError;
                        while($already = $req->fetch()) {
                        //Si la variable $username n'est pas retrouvé dans le tableau $req
                        // elle sera à zéro, donc différent de 1. Si elle est à deux... il y a un problème !
                            if($already['isThere'] != 1){
                                header('location: unidentified.php?unidentified=true&message=Impossible de vous authentifier');
                                exit();
                            }
                            // Si la variable est égale à 1, on affiche ça
                            else{
                                (header('location: index.php?user=true&message=Bonjour utilisateur lambda'));
                exit();
            }
        }
            }
		}
}