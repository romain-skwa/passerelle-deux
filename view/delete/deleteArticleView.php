<?php
        ob_start();
    ?>

        <section class="container">
            
            <h2>Ici, on supprime les articles</h2>
            <h3>En fait vous avez déjà supprimé l'article intitulé : <?=($_GET['title'])?>...</h3>
      
            <a href="index.php?page=webmaster">Retour à la page de l'administrateur.</a>
            
            <?php require('functions/deleteArticleFunction.php'); // Connexion à la table "article" ?> 
        </section>

        <section>
            <?php  include('view/articlesView/articlesListWebmaster.php') // Liste articles de la page webmaster ?> 
        </section>
<?php
    $content = ob_get_clean();

    require('view/base.php');
    ?>