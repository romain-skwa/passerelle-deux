<?php 
        ob_start();
    ?>
        <head>

        </head>
        <section class="container">
            
            <h2>L'article a maintenant été changé</h2>
            <h3>Vous devriez être content...</h3>
      
            <?php require('functions/updateArticleFunction.php');?>
        </section>

        <section>
            <?php include('view/articlesView/articlesListWebmaster.php')?>
        </section>
<?php
    $content = ob_get_clean();

    require('view/base.php');
    ?>