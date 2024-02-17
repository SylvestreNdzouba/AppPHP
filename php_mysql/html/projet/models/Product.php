<?php
require_once dirname(__FILE__) . '/../config/db.php';

class Product
{
    private $id;
    private $name;
    private $price;
    private $description;

    public function __construct($name = null)
    {
        if (!empty($name)) {
            $this->setName($name);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        if (strlen($name) < 2) {
            throw new Exception("Nom du produit trop court.");
        }
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescription($description)
    {
        if (strlen(($description) < 5)) {
            throw new Exception(("La description est assez courte, il ne faudrait pas détailler un peu plus ?"));
        }
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public static function getList()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT id, name, description, price FROM product");

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function get($product_id)
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        try {
            $stmt = $dbh->prepare("SELECT id, name, description, price FROM product WHERE id = :product_id");
            $stmt->bindParam(':product_id', $product_id);

            $stmt->execute();
            return $stmt->fetchObject(__CLASS__);
        } catch (PDOException $e) {
            throw new Error($e);
        }
    }
}
