<?php



require_once("Mysql.php");


class Product  extends Mysql
{
    public function get_all()
    {

        $query = "SELECT * FROM products";
        $result = $this->connect()->query($query);
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($products, $row);
            }
        }
        return $products;
    }

    public function get_one($id)
    {
        $query = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->connect()->query($query);
        $product = null;
        if ($result->num_rows == 1) {
            $product = $result->fetch_assoc();
        }
        return $product;
    }

    public function store(array $date)
    {
        $date['name'] = mysqli_real_escape_string($this->connect(), $date['name']);
        $date['desc'] = mysqli_real_escape_string($this->connect(), $date['desc']);
        $query = "INSERT INTO products (`name`,`desc`,`image`,`price`,`created_at`)
        VALUES('{$date['name']}','{$date['desc']}','{$date['image']}','{$date['price']}',CURRENT_TIME())";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function update(array $date, $id)
    {
        $date['name'] = mysqli_real_escape_string($this->connect(), $date['name']);
        $date['desc'] = mysqli_real_escape_string($this->connect(), $date['desc']);
        $query = "UPDATE  products SET 
        `name` = '{$date['name']}',
        `desc` = '{$date['desc']}',
        `price` = '{$date['price']}',
        `image` = '{$date['image']}',
        `updated_at` = CURRENT_TIME()
        where id ='$id'";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = "DELETE from products WHERE id ='$id'";
        $result = $this->connect()->query($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
