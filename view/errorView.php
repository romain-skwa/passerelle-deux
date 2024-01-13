<?php        
        ob_start();

    ?>
        
        <?= require('view/loginFormView.php') ?>

        <section class="container">
        
            <h2>Euh...</h2>
            <p><?= $error ?></p>

        </section>
<?php 
    $content = ob_get_clean();

    require('view/base.php');
    ?>