<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];

            switch ($page){
                case 'user':
                    echo '<title>Utilisateurs</title>';
                    break;

                case 'webmaster':
                    echo '<title>Webmaster</title>';
                    break;

                case 'error':
                    echo '<title>Non identifié</title>';
                    break;

                default: 
                    echo '<title>Bienvenue</title>';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/design/default.css" />
        <link rel="stylesheet" href="public/design/changementBootstrap.css" />
       <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    </head>

    <body class= bg-menthe>

        <header class="rounded-bottom-4">

            <div class="haut_gauche"> 
                <img class="petit_logo" src="../public/asset/menthe.jpg" alt="Praline Menthe Cerise">
                <h1 class="--bs-primary-text-emphasis">Praline Menthe Cerise</h1>
            </div>

                <div class="haut_droite">
                    <?php
                        if(!isset($_GET['page'])){ // Quand on arrive sur le site, il n'y a pas le mot clef "page" inclus dans la barre d'adresse

                            if(!isset($_GET['user']) && !isset($_GET['webmaster'])) { 
                                    // Formulaire dans lequel l'utilisateur entre son identifiant et son mot de passe.
                                    require('loginFormView.php');                 
                            }

                        }
                        else{   // Lien pour se déconnecter 
                             include('model/disconnectionModel.php');
                        }
                    ?>
                </div>

        </header>
        
        <?php echo $content ?>            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    </body>
</html>