<?php

        
function addArticle($title,$article){
            // On va se servir de la class articleManager présente d'en dessous
    $articleManager = new articleManager();
            // On va exécuter la fonction article qui sert à ajouter des données title et article dans bdd
            // Et on englobe le résultat dans une variable $result
    $result = $articleManager->article($title,$article);

    if($result === false ){ // Ça veut dire que la requête n'a pas été envoyée
            throw new Exception("Impossible d'ajouter votre article pour le moment.");
    }
    else {
            header('location: index.php?page=webmaster');
            exit();
    }
}


class articleManager{
        public function article($title,$article){
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
            }
            catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
            // On insere le nouveau titre et le nouvel article dans la base de données.
            $ajouter = $bdd->prepare('INSERT INTO article(title,contenu) VALUES (?,?)');
            $result = $ajouter->execute([$title,$article]);
            return $result;
        }
    }