<?php
    ob_start();

    // Si la superglobale SESSION n'est pas celle d'un utilisateur ou du webmaster, la page renvoie automatiquement à "forbiden"
    if($_SESSION['connected'] != htmlspecialchars("regularUser") && $_SESSION['connected'] != htmlspecialchars("webmaster")){
        (header('location: index.php?page=forbidden'));
        exit();
    }

    ?>

        <section class="w-50 mx-auto m-4 text-center">

            <h2>Page selon le point de vue des utilisateurs</h2>
            
            <h3>
                Vous voici de retour :  <?= $_SESSION['username']; ?>.
            </h3>

        </section>

        <section>
            <?= include('view/articlesView/articlesListUsers.php') // Liste des articles vue par les utilisateurs ?> 
        </section>
<?php 
    $content = ob_get_clean();

    require('view/base.php'); // template
    ?>