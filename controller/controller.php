<?php

        require_once('model/modeleWebmaster.php');// Accéder à la table Webmaster & Vérifier si les champs article sont remplis
        require_once('functions/addArticleFunction.php'); // Ajouter l'article dans la bdd
        
        // Quand le webmaster entre son identifiant et son mot de passe, ça enclenche cette fonction :
                function webmaster(){
                        checkAddArticle(); // Exécuter vérification si les champs sont remplis pour rajouter un article
                        require_once('view/main/webmasterView.php'); // Page visible par seulement le webmaster
                }
                /******************************* */
                        
        require_once('model/modeleUser.php');
        // Quand un utilisateur entre son identifiant et son mot de passe, ça enclenche cette fonction :
                function user(){
                        $requete = getUser(); // Accéder aux données de la table "User" 
                        require_once('view/main/userView.php'); // Page visible par l'utilisateur connecté
                }
                        /******************************* */

        require_once('model/checkFirst.php');
        // Quand le visiteur du site n'a pas encore essayé de se connecter...        
        function first(){
              include('view/firstView.php');
        }
        
        require_once('functions/getArticleFunction.php');
        function article(){
                $articles = getArticle();
                echo "<pre>";
                print_r($articles);
                echo "</pre>";
                require_once('view/main/webmasterView.php');
        }
        /*
        require_once('model/inscriptionModele.php');
        function inscription(){
                require_once('view/inscriptionView.php');
        }
        */
        function updateArticle(){
                include('view/changeArticle/updateArticle.php');
        }

        function articleChanged(){
                include('view/changeArticle/articleChanged.php');
        }

        function deleteArticle(){
                include('view/delete/deleteArticleView.php');
                }

        function deleteComments(){
                 require_once('view/delete/deleteCommentsView.php');
                }
                
        require_once('model/commentariesModele.php'); // pour se connecter à la table commentaries
        function commentary(){
                require_once('view/comments/commentaryView.php');
        }

        function sendCommentary(){
                require_once('view/comments/sendCommentaryView.php');
        }
        function forbidden(){
                require_once('view/forbiddenView.php');
        }

        function unsetSession(){
                require_once('model/unsetSession.php');
        }