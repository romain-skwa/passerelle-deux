<?php
$id         = htmlspecialchars($_GET["edit"]);// l'identifiant dans l'adresse
$newTitle   = htmlspecialchars($_POST["newTitle"]);// Le nouveau titre
$newContent = htmlspecialchars($_POST["newArticle"]);// Le nouveau contenu de l'article

if(!empty($_POST['newTitle']) && !empty($_POST['newArticle'])){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }   
    
    $changer = $bdd->prepare('UPDATE article SET title = ?, contenu = ? WHERE id = ? ');
    $result = $changer->execute([$newTitle,$newContent,$id]);
}