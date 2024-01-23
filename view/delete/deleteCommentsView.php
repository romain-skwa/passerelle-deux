<?php 
        ob_start();
    ?>

        <section class="container">
            <?php require('functions/deleteCommentsFunction.php'); // Connection à la table "commentaries" ?>
            
            <h2>Suppression de commentaire</h2>
            <h3>Le commentaire écrit par <u><?=($_GET['name'])?></u> sous l'article "<b><?=($_GET['titleArticle'])?></b>" vient d'être supprimé...</h3>
      
        </section>

        <a href="index.php?page=webmaster">Retour à la page de l'administrateur.</a>

        <section>
            <?= include('view/articlesView/articlesListWebmaster.php') // Liste articles de la page webmaster ?> 
        </section>
<?php 
    $content = ob_get_clean();

    require('view/base.php');
    ?>