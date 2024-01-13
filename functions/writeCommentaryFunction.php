<?php
/*
Cette page fait suite à articlesListUsers.php
Les trois informations présentes dans la barre d'adresse vont être stockées dans trois variables.
*/
    $get_id         = htmlspecialchars($_GET["id"]);
    $get_title      = htmlspecialchars($_GET["title"]);
    $get_content    = htmlspecialchars($_GET["content"]);
?>
    <div class="encadre">
        <b>
            <?= $get_title ?> <!-- J'affiche le nom de l'article -->
        </b>        
    <br>        
        <?= $get_content ?> <!-- J'affiche le contenu de l'article -->
    <br>
    <!-- Le formulaire va envoyer les données à la page sendCommentary
        la variable incluse dans la barre whichArticle va contenir l'identifiant de l'article -->
        <form method ="post" action="index.php?page=sendCommentary&whichArticle=<?= $get_id ?>">
            <p>
                <textarea name="commentary" id="commentary" cols="50" rows="5">Inscrivez ici votre commentaire.</textarea>
            </p>
            <p>
                <input type="submit" value="Envoyer mon commentaire">
            </p>
        </form>

    </div>