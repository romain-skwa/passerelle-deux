<?php
       
function updateFunction($title,$article,$edit_new){    
        // On va se servir de la class articleManager présente d'en dessous
$changeArticle = new changeArticle();
    // On va exécuter la fonction article qui sert à ajouter des données title et article dans bdd
    // Et on englobe le résultat dans une variable $result
$result = $changeArticle->article2($title,$article,$edit_new);

if($result === false ){ // Ça veut dire que la requête n'a pas été envoyée
    throw new Exception("Impossible d'ajouter votre avis pour le moment.");
}
else {
    header('location: index.php?page=webmaster');
    exit();
}
}


class changeArticle{
public function article2($title,$article,$edit_new){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

    $title = htmlspecialchars($_POST['title']);
    $article = htmlspecialchars($_POST['article']);
    $edit_new = htmlspecialchars($_GET['edit']); // Le contenu de "edit" est stockée dans une variable $edit_new sécurisée.
    
    $newChange = $bdd->prepare('SELECT * FROM article WHERE title = ?'); // On crée une variable $newChange dans laquelle sera stocké tout le contenu qui porte le titre indiqué dans $edit_new. Par exemple, tout le contenu du titre 1 (titre, texte) se retrouvera dans la variable $newChange. 
    $newChange->execute(array($edit_new));

    if($newChange->rowCount() == 1){ // On vérifie si l'article demandé existe déjà en comptant avec rowCount() dans la table.
        $newChange = $newChange->fetch(); // On récupère notre article que l'on va changer.

        $changer = $bdd->prepare('UPDATE article SET title = ?, contenu = ?, WHERE title = ?');
        $result = $changer->execute([$title,$article,$edit_new]);
        return $result;
    } else {
        die('Erreur : Ça marche po...');
    }
}
}