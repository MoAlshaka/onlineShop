<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("location:login.php");
}

require_once('classes/Product.php');
$id = $_GET['id'];
$product = new Product;
$prod = $product->get_one($id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create-product</title>
</head>

<body>
    <div>
        <form action="handlers/updateProduct.php?id=<?php echo $prod['id']; ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="name" id="" placeholder="name" value="<?php echo $prod['name']; ?>">
            <textarea name="desc" id="" cols="30" rows="10"><?php echo $prod['desc']; ?></textarea>
            <input type="number" name="price" id="" value="<?php echo $prod['price']; ?>">
            <input type="file" name="image" id="">
            <input type="submit" name="update" value="update">
        </form>
    </div>
</body>

</html>