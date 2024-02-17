<?php
require_once dirname(__FILE__) . '/../config/db.php';

class User
{
    static private $TABLE_NAME = 'user';
    private $login;
    private $password;

    public function __construct()
    {
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        if (strlen($login) < 2) {
            throw new Exception("Login trop court");
        }
        $this->login = $login;
        return $this;
    }

    public function setPassword($password)
    {
        if (strlen($password) < 5) {
            throw new Exception("Mot de passe trop court");
        }
        $this->password = $password;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public static function getUser($login)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT * FROM user  WHERE login = :login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $user = new User();
            $user->setLogin($result['login']);
            $user->setPassword($result['password']);
            return $user;
        } else {
            return null;
        }
    }

    public function save()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt = $dbh->prepare("INSERT INTO user (login, password) VALUES (:login, :password)");
        $stmt->bindParam(':login', $this->login);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }
}
