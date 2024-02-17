<form action="/projet/handlers/checkUser.php" method="post">
    <p>
        <label for="login">Login</label><br />
        <input type="text" id="login" name="loginLog" required>
    </p>

    <p>
        <label for="mdp">Mot de passe</label><br />
        <input type="password" id="mdp" name="mdpLog" required></input>
    </p>
    <br />
    <button type="submit">Se connecter</button>
</form>

<a href="/projet/forms/account.php">Créer un compte</a>