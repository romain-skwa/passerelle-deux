<?php
// Suite de la page writeCommentaryFunction.php

// Une variable GET
// Une variable POST
// Une variable SESSION
// Trois catégories différentes. C'est du grand art.

/*
La variable $_GET['whichArticle'] nous indique quel article a été commenté. Cette information sera indispensable quand il faudra afficher les commentaires sous les articles.
La variable $_POST['commentary'] est le commentaire en lui-même.
La super globale $_SESSION['username'] est le nom de l'utilisateur ou de l'administrateur ayant écrit le commentaire.
*/

if(!empty($_GET['whichArticle']) && !empty($_POST['commentary']) && !empty($_SESSION['username'])){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    } 
    // Les données ci-dessus sont stockées dans des variables
    $whichArticle = htmlspecialchars($_GET["whichArticle"]); // id de l'article commenté
    $commentary   = htmlspecialchars($_POST['commentary']); // Commentaire écrit
    $userName     = htmlspecialchars($_SESSION['username']); // Nom de l'auteur du commentaire
        
        // Ces données sont stockées dans la table "commentaries"
        $createComment = $bdd->prepare('INSERT INTO commentaries(whichArticle,commentary,name) VALUES (?,?,?)');
        $result = $createComment->execute([$whichArticle,$commentary,$userName]);
        return $result;
    }    