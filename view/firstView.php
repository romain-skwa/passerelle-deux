<?php
        ob_start();
        
        ?>

       <h3 class="w-75 mx-auto m-4 p-3">Nous sommes sur la page d'accueil. Quel design magnifique. Du jamais vu ! Oulala. Même pas centré.</h3>
       
       <section>
            <?php echo include('view/articlesView/articlesListNormal.php') // Affichage des articles ?> 
        </section>

<?php 
    $content = ob_get_clean();
    require('view/base.php');
?>