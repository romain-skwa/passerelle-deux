<?php
    function getUser(){
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        $requete = $bdd->query('SELECT * FROM user');
        return $requete;
    }