<p class="w-50 mx-auto m-4">Voici la liste des articles :</p> <!-- Affichage des articles visibles quand l'utilisateur n'est pas connecté -->

<?php           
    $articles = getArticle();
    foreach($articles as $article){
        ?>

        <section class="ensemble text-success-emphasis w-50 p-3 mx-auto">
            <article class="article  p-3  bg-cerise text-dark rounded-top-4 " style="--bs-bg-opacity: 1;">
                <p>
                    <b><?= $article['title'] ?></b>
                    <br>
                    <?= $article['contenu'] ?>
                </p>   
            </article>

            <div class="w-100 p-3 bg-warning text-dark rounded-bottom-4" style="--bs-bg-opacity: 1;"><!--  On insère les commentaires des articles -->
                <!-- Ici, j'ai laissé le require et je me retrouve avec des 1 partout -->
                <?= require('functions/getCommentsFunction.php') ?>
        </section>

    <?php
        }
    ?>