<?php 
        ob_start();
    ?>

        <section class="container">            
            <h2>Commentez l'article intitulé : <?=($_GET['title'])?></h2>
            <h3>Et respectez la langue française !!</h3>
        </section>

        <section>
            <?= require('functions/writeCommentaryFunction.php') // La fonction servant à écrire un commentaire ?>
        </section>

        <section>
            <?= include('view/articlesView/articlesListUsers.php') // Liste articles vur par les utilisateurs ?> 
        </section>

<?php 
    $content = ob_get_clean();

    require('view/base.php'); // template
    ?>