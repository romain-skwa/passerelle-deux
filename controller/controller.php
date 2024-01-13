<?php

        require('model/modeleWebmaster.php');// Accéder à la table Webmaster & Vérifier si les champs article sont remplis
        require('functions/addArticleFunction.php'); // Ajouter l'article dans la bdd
        
        // Quand le webmaster entre son identifiant et son mot de passe, ça enclenche cette fonction :
                function webmaster(){
                        checkAddArticle(); // Exécuter vérification si les champs sont remplis pour rajouter un article
                        require('view/main/webmasterView.php'); // Page visible par seulement le webmaster
                }
                /******************************* */
                        
        require('model/modeleUser.php');
        // Quand un utilisateur entre son identifiant et son mot de passe, ça enclenche cette fonction :
                function user(){
                        $requete = getUser(); // Accéder aux données de la table "User" 
                        require('view/main/userView.php'); // Page visible par l'utilisateur connecté
                }
                        /******************************* */

        require('model/checkFirst.php');
        // Quand le visiteur du site n'a pas encore essayé de se connecter...        
        function first(){
              require('view/firstView.php');
        }
        
        require('functions/getArticleFunction.php');
        function article(){
                $articles = getArticle();
                echo "<pre>";
                print_r($articles);
                echo "</pre>";
                require('view/main/webmasterView.php');
        }
        /*
        require('model/inscriptionModele.php');
        function inscription(){
                require('view/inscriptionView.php');
        }
        */
        function updateArticle(){
                require('view/changeArticle/updateArticle.php');
        }

        function articleChanged(){
                require('view/changeArticle/articleChanged.php');
        }

        function deleteArticle(){
                 require('view/delete/deleteArticleView.php');
                }

        function deleteComments(){
                 require('view/delete/deleteCommentsView.php');
                }
                
        require('model/commentariesModele.php'); // pour se connecter à la table commentaries
        function commentary(){
                require('view/comments/commentaryView.php');
        }

        function sendCommentary(){
                require('view/comments/sendCommentaryView.php');
        }
        function forbidden(){
                require('view/forbiddenView.php');
        }

        function unsetSession(){
                require('model/unsetSession.php');
        }