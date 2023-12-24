<?php
session_start();
require_once('../classes/Product.php');
require_once('../helpers/Image.php');
require_once('../classes/validation/Validator.php');

use helpers\Image;
use validation\Validator;

if (isset($_POST['save'])) {

    $date["name"] = $_POST['name'];
    $date["desc"] = $_POST['desc'];
    $date["price"] = $_POST['price'];
    $image = $_FILES['image'];

    $v = new Validator;
    $v->rules('name', $date["name"], ['required', 'string', 'max:100']);
    $v->rules('desc', $date["desc"], ['required']);
    $v->rules('price', $date["price"], ['required']);
    $v->rules('image', $image, ['required-image', 'image']);
    $errors = $v->errors;

    if ($errors == []) {

        $img = new Image($image);
        $date['image'] = $img->new_name;
        $img->upload("../uploads/products");

        $product = new Product;
        $prod = $product->store($date);
        if ($prod == true) {
            $_SESSION["add"] = "add product successfully";
            header('location: ../index.php');
        } else {
            $_SESSION['errors'] = 'error found';
            header('location: ../createProduct.php');
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ../createProduct.php');
    }
}
