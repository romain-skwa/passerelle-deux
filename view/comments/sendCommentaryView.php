<?php
    ob_start();

    require_once('functions/sendcommentaryFunction.php'); // 
    ?>
        
        <section class="container">

            <h2>Le commentaire a été enregistré</h2>            

            <p>
                Et oui. Je sais maintenant que je peux rediriger automatiquement l'utilisateur au lieu de le laisser lire ce message.
                <br>
                Mais il va quand même falloir cliquer sur le lien ci-dessous... manuellement.
            </p>
        </section>
        
        <?php 
            if ($_SESSION['connected'] == htmlspecialchars("webmaster")){ ?>
                <a href="index.php?page=webmaster">Retour à la liste d'articles vue par le webmaster.</a> 
                <?php
            }
            else if ($_SESSION['connected'] == htmlspecialchars("regularUser")){ ?>
                <a href="index.php?page=user">Retour à la liste d'articles.</a> 
        <?php
            }
        ?>

<?php 
    $content = ob_get_clean();

    require('view/base.php');
    ?>