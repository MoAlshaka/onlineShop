<?php
session_start();
require_once('../classes/Product.php');
require_once('../helpers/Image.php');

use helpers\Image;

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $product = new Product;
    $prod = $product->get_one($id);
    $date["name"] = $_POST['name'];
    $date["desc"] = $_POST['desc'];
    $date["price"] = $_POST['price'];
    $date["image"] = $prod['image'];

    if (isset($_FILES['image']) && strlen($_FILES['image']['name'] > 0)) {

        $image = $_FILES['image'];
        $img = new Image($image);
        $date['image'] = $img->new_name;
        unlink("../uploads/products/" . $prod['image']);
        $img->upload("../uploads/products");
    }



    $updateprod = $product->update($date, $id);
    if ($updateprod == true) {
        $_SESSION["update"] = "update product successfully";
        header("location: ../showProduct.php?id=$id");
    } else {
        $_SESSION['errors'] = 'error found';
        header('location: ../editProduct.php');
    }
}
