<?php
require_once dirname(__FILE__) . '/../config/db.php';

class Order
{
    private $id;
    private $productName;
    private $productPrice;
    private $date;


    public function __construct()
    {
    }

    // public function setProductId($newTitle)
    // {
    //     if (strlen($newTitle) < 4) {
    //         throw new Exception("ça marche pô");
    //     }
    //     $this->title = $newTitle;
    //     return $this;
    // }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date = 'now')
    {
        $testDate = new DateTime($date);
        if ($testDate->getTimestamp() > time()) {
            throw new Exception('La date est supérieur à la date actuelle.');
        }
        $this->date = $testDate;
        return $this;
    }

    public function getDate($format = 'd/m/Y à H:i')
    {
        return $this->date->format($format);
    }



    public function setProductName($productName)
    {
        if (strlen($productName) < 1) {
            throw new Exception('Nom de produit trop court, est ce vraiment un produit ?');
        }
        $this->productName = $productName;
        return $this;
    }

    public function getProductName()
    {
        return $this->productName;
    }

    public function setProductPrice($productPrice)
    {
        if ($productPrice < 0) {
            throw new Exception('Prix invalide');
        }

        $this->productPrice = $productPrice;
        return $this;
    }

    public function getProductPrice()
    {
        return $this->productPrice;
    }

    public static function getList()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $stmt = $dbh->prepare("SELECT * FROM orders");
        $stmt->execute();
        $resultArray = $stmt->fetchAll();
        return array_map(function ($item) {
            return self::formatOrder($item);
        }, $resultArray);
    }

    public static function formatOrder($item)
    {
        $order = new Order();
        $order->setId($item['id']);
        $order->setProductName($item['productName']);
        $order->setProductPrice($item['productPrice']);
        $order->setDate($item['date']);

        return $order;
    }


    public function save()
    {
        global $dsn, $db_user, $db_pass;
        $dbh = new PDO($dsn, $db_user, $db_pass);

        $timestamp = $this->date->format('Y-m-d H:i:s');

        $stmt = $dbh->prepare("INSERT INTO orders (productName, productPrice, date) VALUES (:productName, :productPrice, :date)");
        $stmt->bindParam(':productName', $this->productName);
        $stmt->bindParam(':productPrice', $this->productPrice);
        $stmt->bindParam(':date', $timestamp);


        return $stmt->execute();
    }
}
