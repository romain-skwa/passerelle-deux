<?php
    ob_start();
    ?>

        <section class="container">
            <h2>L'accès à la page demandée est restreint.</h2>
            Connectez-vous pour éventuellement y accéder.
        </section>

        <section class="loginForm">
                <?php
                        if(!isset($_GET['user']) && !isset($_GET['webmaster'])) {
                        // Formulaire dans lequel l'utilisateur entre son identifiant et son mot de passe.
                                require('loginFormView.php');                 
                        }
                ?>
        </section>
       
        <section>
            <?= include('view/articlesView/articlesListNormal.php') // Affichage des articles ?> 
        </section>
<?php
    $content = ob_get_clean();

    require('view/base.php');
    ?>