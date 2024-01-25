<?php
        ob_start();

    ?>
        
        <?php require('view/loginFormView.php') ?>

        <section class="container">
        
            <h2>Euh...</h2>
            <p><?php echo $error ?></p>

        </section>
<?php
    $content = ob_get_clean();

    require('view/base.php');
    ?>