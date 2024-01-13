<?php 
        ob_start();
    ?>
        <head>

        </head>
        <section class="container">
            
            <h2>Ici, nous sommes censés changer les articles. Laaaaaaaaaaaaaaaaaaaaaa</h2>
            
            <?php
            // On appelle la fonction servant à modifier les articles.
            //    require('functions/updateArticleFunction.php');
            $idToUpdate     = htmlspecialchars($_GET["edit"]);
            $ancientTitle   = htmlspecialchars($_GET["ancientTitle"]);
            $ancientContent = htmlspecialchars($_GET["ancientContent"]);
            ?>

            <p>
                Vous vous apprêtez à change l'article portant l'identifiant : <?php echo $idToUpdate ?>
            </p>
            <!-- Formulaire qui s'affiche pour le webmaster quand il est connecté -->
            <form method ="post" action="index.php?page=articleChanged&edit=<?= $idToUpdate ?>">
                
                <p>
                    <label for="newTitle">Titre</label><br>
                    <input type="text" name="newTitle" id="newTitle" size="40" value=" <?= $ancientTitle ?> ">
                </p>
                <p>
                    <label for="newArticle">Article</label><br>
                    <textarea name="newArticle" id="newArticle" cols="40" rows="10"><?= $ancientContent ?></textarea><!-- Important de tout coller comme ceci. Dans le cas contraire, ça donne n'importe quoi dans le champ. -->
                </p>
                <p>
                    <input type="submit" value="Envoyer l'article">
                </p>
            </form>
             
        </section>

        <section>
            <?= include('view/articlesView/articlesListWebmaster.php')?> 
        </section>
<?php 
    $content = ob_get_clean();

    require('view/base.php');
    ?>