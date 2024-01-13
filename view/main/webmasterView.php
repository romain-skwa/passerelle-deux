<?php 
        ob_start();

        // Si ce n'est pas l'administrateur qui est connecté, cette page renvoie automatiquement à la page "forbidden"
        if($_SESSION['connected'] != htmlspecialchars("webmaster")){
            (header('location: index.php?page=forbidden'));
            exit();
        }
    ?>

        <section class="w-50 mx-auto m-4">

            <div class="text-center">
                <h2>Page selon le point de vue du Webmaster</h2>
                <h4>L'administrateur de ce site s'appelle :  <?= $_SESSION['username']; ?>.</h4>
            </div>

            <section class="w-75 bg-warning p-3 text-dark rounded-4 mx-auto">
                <p>Création d'article</p>
                
                <!-- Formulaire de création d'article qui s'affiche pour le webmaster quand il est connecté -->
                <form method ="post" action="index.php?page=webmaster">
                    
                    <p>
                        <label for="title">Titre</label><br>
                        <input type="text" name="title" id="title">
                    </p>
                    <p>
                        <label for="article">Article</label><br>
                        <textarea name="article" id="article" cols="90" rows="10"></textarea><!-- Important de tout coller comme ceci. Dans le cas contraire, ça donne n'importe quoi dans le champ. -->
                    </p>
                    <p class="aDroite">
                        <input type="submit" value="Envoyer l'article">
                    </p>
                    
                </form>
            </section>
             
        </section>

        <section>
            <?= include('view/articlesView/articlesListWebmaster.php') 
            // Liste des articles avec les fonctions disponibles pour le webmaster
            ?> 
        </section>
<?php 
    $content = ob_get_clean();

    require('view/base.php'); // template
    ?>
