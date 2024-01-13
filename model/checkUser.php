<?php
        // L'identifiant est-il dans la base de donnée ?
        // Ici, nous vérifions la table appelée "user"
        $req = $bdd->prepare('SELECT COUNT(*) as isThere FROM user WHERE username = ?');
        $req->execute([$username]);
        
        // Si la variable $username n'est pas retrouvé dans le tableau $req
        // elle sera à zéro, donc différent de 1. Si elle est à deux... il y a un problème !
        while($already = $req->fetch()) {
            if($already['isThere'] != 1){ // On ne reconnait ni le webmaster ni l\'utilisateur
                header('location: index.php?page=error&message=Impossible de vous authentifier');
                exit();

            }
        }
        
        $req = $bdd->prepare('SELECT * FROM user WHERE username = ?');
        $req->execute([$username]);

        while($already = $req->fetch()) {
            if($password == $already['password']){ // Vous êtes un utilisateur lambda
                (header('location: index.php?page=user&message=Vous êtes un utilisateur lambda'));
                $_SESSION['connected'] = htmlspecialchars("regularUser");
                exit();
            }
            // Si la variable est égale à 1, on affiche ça
            else{ // Nom d\'utilisateur : oui. Mot de passe : non.
                header('location: index.php?page=error&message=Impossible de vous authentifier');
                exit();
            }
        }