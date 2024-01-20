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
                    <!-- Le lien ci-dessous mène à la page où l'utilisateur écrit des commentaires.
                        Trois informations sont envoyées dans la barre d'adresse :
                            $article['id'] pour savoir quel article va être commenté.
                            $article['title'] pour pouvoir afficher le titre de l'article dans la page de destination.
                            $article['contenu'] pour afficher le contenu de l'article dans la page de destination.
                    -->
                    <a href="index.php?page=commentary&id=<?= $article['id'] ?>&title=<?= $article['title'] ?>&content=<?= $article['contenu'] ?>">Commenter cet article</a>
                    <br>
                </p>   
            </article>

            <div class="w-100 p-3 bg-warning text-dark rounded-bottom-4" style="--bs-bg-opacity: 1;"><!--  On insère les commentaires des articles -->
                <?php // pourquoi suis-je obligé d'écrire ce code en entier ici ? 
                    // Pourquoi je me retrouve avec des  1 partout quand j'utilise un REQUIRE ?
                    $getCommentaries = getCommentaries();

                    foreach($getCommentaries as $publishCommentaries){
                        if($publishCommentaries['whichArticle'] == $article['id']) {
                        ?>
                
                            <p>
                                <?= $publishCommentaries['commentary'] ?>
                               <br>
                
                                <span>
                                    Commentaire écrit par <b><?= $publishCommentaries['name'] ?></b>
                                </span> 
                            </p>
                
                    <?php
                        }
                    }        
                    ?>
            </div>
            <!--  C'est le REQUIRE ci-dessous que j'utilisais 
                <div class="w-100 p-3 bg-warning text-dark rounded-bottom-4" style="--bs-bg-opacity: .50;">  On insère les commentaires des articles 
                < ?= require('functions/getCommentsFunction.php') ?>
                </div>
                -->
        </section>
    <?php
        }
    ?>