<?php
/*
    Ce code sert pour dans deux fichiers.
    Affichage des commentaires sur la page où personne n'est connecté "articlesListNormal"
    Affichage des commentaires sur la page où les utilisateurs sont connectés "articlesListUsers".
*/

/* 
    La fonction getCommentaries ci-dessous est incluse dans une boucle "foreach($articles as $article)" ; elle même incluse dans la fonction "getArticle".
    La fonction getCommentaries sert à afficher les commentaires.
    La fonction getArticle sert à afficher les articles ainsi que les commentaires y étant attachés.
*/

/*
    La donnée "whichArticle" dans la table "commentaries" est le numéro de l'article où a été écrit le commentaire : son identifiant.
    La donnée "id" est l'identifiant de l'article dans la table "article".

    Dans cette boucle, pour chaque commentaire, on vérifie d'abord si le "whichArticle" correspond à l'identifiant de l'article.
    Si ça correspond, le commentaire vérifié est affiché.
*/
    $getCommentaries = getCommentaries();

    foreach($getCommentaries as $publishCommentaries){
        if($publishCommentaries['whichArticle'] == $article['id']) {
        ?>

            <p>
                <?= $publishCommentaries['commentary'] ?>
               <br>

                <span>
                    Commentaire écrit par <b><?= $publishCommentaries['name'] ?></b>
                </span> 
            </p>

    <?php
        }
    }        
    ?>