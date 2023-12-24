<?php

session_start();

require_once("../classes/Product.php");

$id = $_GET['id'];
$product = new Product();
$prod = $product->get_one($id);
unlink("../uploads/products/" . $prod['image']);
$prod = $product->delete($id);
if ($prod == 1) {
    $_SESSION['delete'] = "delete successfully";
    header('location: ../index.php');
} else {
    header('location: ../index.php');
}
