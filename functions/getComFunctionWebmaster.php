<?php

    $getCommentaries = getCommentaries();

    foreach($getCommentaries as $publishCommentaries){
        if($publishCommentaries['whichArticle'] == $article['id']) {
        ?>

            <p>
                <?= $publishCommentaries['commentary'] ?>
                <a href="index.php?page=deleteComments&id=<?= $publishCommentaries['id'] ?>&name=<?= $publishCommentaries['name'] ?>&titleArticle=<?= $article['title'] ?>">
                        <input name="delete" type="submit" id="delete" value="Supprimer ce commentaire" /></a>
                <br>

                <span>
                    Commentaire écrit par <b><?= $publishCommentaries['name'] ?></b>
                </span> 
            </p>

    <?php
        }
    }        
    ?>