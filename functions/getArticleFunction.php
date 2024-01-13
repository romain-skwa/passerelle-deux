<?php // pour aller chercher les articles
    function getArticle(){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        $requeteArticle = $bdd->query('SELECT * FROM article');
        $resultat = $requeteArticle->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        
        }