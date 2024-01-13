<?php
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_two'])){
        // Je me connecte à la base de données
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=passerelle_deux;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : ' .$e->getMessage());
        }

        // Je déclare les variables
		$username      = htmlspecialchars($_POST['username']);// Variable provenant de l'input username
		$password      = htmlspecialchars($_POST['password']);
		$passwordTwo   = htmlspecialchars($_POST['password_two']);

        // Les mots de passe sont-ils identiques ?
		if($password != $passwordTwo){
			header('location: inscription.php?error=1&message=Vos mots de passe ne sont pas identiques');
			exit();
		}

		// L'identifiant existe-t-il déjà dans notre base de données ?
		$req = $bdd->prepare('SELECT COUNT(*) as listOfName FROM user WHERE username = ?');
		$req->execute([$username]);

		while($nameVerification = $req->fetch()) {
			if($nameVerification['listOfName'] != 0){
				header('location: inscription.php?error=1&message=Cet identifiant est déjà utilisé par quelqu\'un d\'autre.');
				exit();
			}
		}

		// Chiffrement du mot de passe.
		$password = "ebi".sha1($password."byx")."poa845";

        // Secret
		$secret = sha1($username).time();
        $secret = sha1($secret).time();

        // ajouter un utilisateur
		$req = $bdd->prepare('INSERT INTO user(username, password, secret) VALUES(?,?,?)');
		$req->execute([$username, $password, $secret]);
		
		header('location: inscription.php?success=1');
		exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    
    <section>
        <?php 
            if(isset($_GET['error']) && isset($_GET['message'])){
                echo '<div class="alert error">'.htmlspecialchars($_GET['message']).'</div>';
                }
                else if(isset($_GET['success'])){
                    echo '<div>Vous êtes désormais inscrit.</div>';
                }
            ?>
    </section>

    <form method="post" action="inscription.php">
        <input type="username" name="username" placeholder="Veuillez créer un identifiant" required />
        <input type="password" name="password" placeholder="Créez un mot de passe" required />
        <input type="password" name="password_two" placeholder="Confirmez votre mot de passe" required />
        <button type="submit">S'inscrire</button>
    </form>
    
    <p>Déjà inscrit ? <a href="index.php">Connectez-vous</a>.</p>
</html>
</body>

