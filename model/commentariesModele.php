<?php
    function getCommentaries(){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        $getCommentaries = $bdd->query('SELECT * FROM commentaries');
        return $getCommentaries;
    }