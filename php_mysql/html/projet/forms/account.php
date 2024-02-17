<form action="/projet/handlers/createUser.php" method="post">
    <p>
        <label for="login">Login</label><br />
        <input type="text" id="login" name="login" required>
    </p>

    <p>
        <label for="mdp">Mot de passe</label><br />
        <input type="password" id="mdp" name="mdp" required></input>
    </p>
    <p>
        <label for="mdpConfirms">Confirmation du mot de passe</label><br />
        <input type="password" id="mdpConfirm" name="mdpConfirm" required></input>
    </p>
    <br />
    <button type="submit">Envoyer</button>
</form>

<a href="/projet/forms/login.php">Se connecter</a>