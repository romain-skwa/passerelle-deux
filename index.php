<?php
            session_start();

            if(!empty($_POST['username'])){
                // Créer la session
                $_SESSION['username'] = htmlspecialchars($_POST['username']);
            }
            
?>

<?php
        try{
                // Routeur
                require('controller/controller.php');
                
                if(isset($_GET['page'])){
                        $page = $_GET['page'];
                        // Le mot webmaster se trouve dans la barre d'adresse, donc on va afficher sa partie dédiée.
                        switch ($page){
                                /*
                                case 'inscription':
                                        inscription();
                                        break;
                                */        
                                case 'webmaster': // Appel de la fonction webmaster qui va vérifier et afficher le contenu webmaster
                                        webmaster();
                                        echo'Ceci est bien la page vu par le webmaster.';
                                        break;
                                case 'user': // Appel de la fonction user qui va vérifier et afficher le contenu user
                                        user();
                                        break;                        
                                case 'update': // Changer le contenu d'un article
                                        updateArticle();
                                        break;
                                case 'articleChanged': // quand l'article a été changé
                                        articleChanged();
                                        break;
                                case 'delete':  // Supprimer un article
                                        deleteArticle();
                                        break;
                                case 'deleteComments': // Supprimer un commentaire
                                        deleteComments();
                                        break;                    
                                case 'commentary':  // Pour écrire un nouveau commentaire
                                        commentary();
                                        break;                    
                                case 'sendCommentary': // Quand le commentaire a bien été enregistré
                                        sendCommentary();
                                        break;                        
                                case 'forbidden': // Quand un visiteur cherche à accéder à une page réservée à l'administrateur
                                        forbidden();
                                        break;                        
                                case 'unsetSession': // Quand on se déconnecte
                                        unsetSession();
                                        break;                                     
                                default: throw new Exception("Cette page n'existe pas ou a été supprimée.");       
                                }

                        } else {
                                first(); // Cette fonction crée une page d'accueil visible avant la connexion 
                        }

                }                                
        
                catch(Exception $e){
                $error = $e->getmessage();
                require('view/errorView.php');
        }