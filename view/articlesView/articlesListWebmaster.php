<p class="w-50 mx-auto m-4">Voici la liste des articles :</p>

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
                    <br>
                    <a href="index.php?page=commentary&id=<?= $article['id'] ?>&title=<?= $article['title'] ?>&content=<?= $article['contenu'] ?>">Commenter cet article</a>
                    <br>
                    <a href="index.php?page=delete&id=<?= $article['id'] ?>&title=<?= $article['title'] ?>">
                        <input name="delete" type="submit" id="delete" value="Supprimer cet article" /></a>
                    <br>
                    <a href="index.php?page=update&edit=<?= $article['id'] ?>&ancientTitle=<?= $article['title'] ?>&ancientContent=<?= $article['contenu'] ?>">Modifier</a>
                </p>   
            </article>

                <div class="w-100 p-3 bg-warning text-dark rounded-bottom-4" style="--bs-bg-opacity: 1;"> <!--  On insère les commentaires des articles -->
                <?php require('functions/getComFunctionWebmaster.php') ?>
                </div>
        </section>
<?php
    }
?>