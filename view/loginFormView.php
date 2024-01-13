<section>

<!-- Formulaire de connexion basique pour le webmaster et pour les utilisateurs -->
    <form class="loginForm" method="post" action = index.php ><!-- Création du formulaire -->
        <div class="rectangle1">
            <input type="text" name="username" class="username" id="username" required placeholder="Votre identifiant"><br>
        </div>

        <div class="rectangle2">
            <input type="password" name="password" class="password" id="password" required placeholder="Votre mot de passe"><br>
        </div>

        <div class="rectangle3">
            <button class='identifier' type="submit">S'identifier</button><br>
        </div>

        <div class="rectangle4">
            <a class ="inscrivezVous" href="inscription.php">Inscrivez-vous</a>
        </div>
    </form>
</section>