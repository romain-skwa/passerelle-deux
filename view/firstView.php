<?php
        ob_start();
        
        ?>

       <h3 class="w-50 mx-auto m-4 p-3">Nous sommes sur la page d'accueil.</h3>
        <section>
            <?= include('view/articlesView/articlesListNormal.php') // Affichage des articles ?> 
        </section>

<?php 
    // require('public/javascript/first.php');
    $content = ob_get_clean();
    require('view/base.php');
?>