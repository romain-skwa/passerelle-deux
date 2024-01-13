<?php
    // Fonction pour se connecter à la base de donnée du webmaster
 function getwebmaster(){        
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        
        $requete = $bdd->query('SELECT * FROM webmaster');
        
        return $requete;
        
    }

function checkAddArticle(){
    if(!empty($_POST['title']) && !empty($_POST['article'])){
        // Si les champs sont remplis, j'utilise une méthode présente dans addArticleFunction.php pour créer un nouvel article dans la bdd
        // les deux paramètres entre les ( ) de cette fonction sont les deux valeurs qu'on vient d'entrer dans les input
        addArticle(htmlspecialchars($_POST['title']),htmlspecialchars($_POST['article']));
    }
}