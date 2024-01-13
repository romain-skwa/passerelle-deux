<?php

    // Quand les deux champs sont remplis, la condition va s'exécuter avec 2.5 secondes de retard :
    // le temps que les animations se finissent
    // Connexion à la bdd

    if(!empty($_POST['username']) && !empty($_POST['password'])/*=== time_nanosleep(2,5000)*/) {

        try{ // Si j'enlève cette partir try catch, ça ne fonctionne pas. 
            //je croyais qu'avec le code présent dans modelewebmaster.php, ça marcherait
              $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
            }
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage());
            }
            
            // Variables
            $username    = htmlspecialchars($_POST['username']);
            $password    = htmlspecialchars($_POST['password']);
            
            // Chiffrement du mot de passe.
            $password = "ebi".sha1($password."byx")."poa845";
            
            // L'identifiant est-il celui du webmaster ?
            // Ici, nous vérifions d'abord dans la table appelée "webmaster"
            $web = $bdd->prepare('SELECT COUNT(*) as isThereWeb FROM webmaster WHERE username = ?');
            $web->execute([$username]);
            
            while($master = $web->fetch()) {
                // Si l'identifiant est différent de 1, il n'est pas celui du webmaster.
                // Donc on applique ce qu'il y a entre les { } pour lancer la vérification User (utilisateur)
                if($master['isThereWeb'] != 1){
                    require_once('model/checkUser.php');// Vérification user
                }
            }

            // On appelle toutes les informations concernant les webmaster
            $web = $bdd->prepare('SELECT * FROM webmaster WHERE username = ?');
            $web->execute([$username]);

            while($master = $web->fetch()) {
                // Si cette condition est remplie, l'identifiant est celui du webmaster
                if($password == $master['password']){
                    (header('location: index.php?page=webmaster&message=Vous êtes le webmaster'));
                    $_SESSION['connected'] = htmlspecialchars("webmaster");
                    exit();
                }
                // Sinon, on appelle la partie où on vérifie la table dédiée aux utilisteurs.
                else{ // On reconnait le nom du webmaster mais pas le mot de passe hé hé hé
                    header('location: index.php?error=true&message=Impossible de vous authentifier. ');
                    exit();
            }
		}
    }

