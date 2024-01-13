<p class="w-50 mx-auto m-4">Voici la liste des articles :</p> <!-- Affichage des articles visibles quand l'utilisateur n'est pas connecté -->

<?php           
    $articles = getArticle();
    foreach($articles as $article){
        ?>

        <section class="ensemble text-success-emphasis w-50 p-3 mx-auto">
            <article class="article  p-3  bg-warning text-dark rounded-top-4 " style="--bs-bg-opacity: .75;">
                <p>
                    <b><?= $article['title'] ?></b>
                    <br>
                    <?= $article['contenu'] ?>
                    <br>
                    <a href="index.php?page=commentary&id=<?= $article['id'] ?>&title=<?= $article['title'] ?>&content=<?= $article['contenu'] ?>">Commenter cet article</a>
                </p>   
            </article>

            <div class="w-100 p-3 bg-warning text-dark rounded-bottom-4" style="--bs-bg-opacity: .50;"><!--  On insère les commentaires des articles -->
                <?= require('functions/getCommentsFunction.php') ?>
            </div>
        </section>

    <?php
        }
    ?>