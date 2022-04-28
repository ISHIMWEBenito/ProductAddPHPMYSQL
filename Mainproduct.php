<?php

require_once "database.php";

abstract class Mainproduct
{

    protected $id;
    protected $sku;
    protected $name;
    protected $price;

    public function __construct($id = 0, $sku = "", $name = "", $price = "")
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function set_Id($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    // sku
    public function set_sku($sku)
    {
        $this->sku = $sku;
    }
    public function get_sku($sku)
    {
        return $this->sku;
    }

    // name
    public function set_name($name)
    {
        $this->name = $name;
    }
    public function get_name($name)
    {
        return $this->name;
    }

    // price
    public function set_price($price)
    {
        $this->price = $price;
    }
    public function get_price($price)
    {
        return $this->price;
    }
}

// Child class
class productType extends Mainproduct
{

    protected $size;
    protected $weight;
    protected $height;
    protected $width;
    protected $length;
    protected $dimension;
    protected $dbCnx;

    public function __construct($id = 0, $sku = "", $name = "", $price = "", $size = "", $weight = "", $height = "", $width = "", $length = "", $dimension = "")
    {
        $this->size = $size;
        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->dimension = $dimension;

        parent::__construct($id, $sku, $name, $price);
        $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    }

    // size
    public function set_size($size)
    {
        $this->size = $size;
    }
    public function get_size()
    {
        return $this->size;
    }

    // weight
    public function set_weight($weight)
    {
        $this->weight = $weight;
    }
    public function get_weight()
    {
        return $this->weight;
    }

    // height
    public function set_height($height)
    {
        $this->height = $height;
    }
    public function get_height()
    {
        return $this->height;
    }

    // width
    public function set_width($width)
    {
        $this->width = $width;
    }
    public function get_width()
    {
        return $this->width;
    }

    // length
    public function set_length($length)
    {
        $this->length = $length;
    }
    public function get_length()
    {
        return $this->length;
    }

    // dimension
    public function set_dimension()
    {
        if (!($this->height && $this->width && $this->length)) {
            $this->dimension = "";
        } else {
            $this->dimension = "$this->height  x  $this->width  x  $this->length";
        }
    }
    public function get_dimension()
    {
        return $this->dimension;
    }

    public function validateForm()
    {
        if (!($this->sku && $this->name && $this->price)) {
            header("Location:Form.php");
        } else {
            $this->insertData();
        }
    }

    public function insertData()
    {
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO product_s(sku,n_ame,price,size,w_eight,dimension) values(?,?,?,?,?,?)");
            $stm->execute([$this->sku, $this->name, $this->price, $this->size, $this->weight, $this->dimension]);
            header("Location:index.php");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM product_s");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM product_s WHERE id =?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
            header("Location:index.php");

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Cancel
    public function cancel()
    {
        return $this->sku = $this->name = $this->price = $this->height = $this->width = $this->length = $this->weight = "";
    }
}
