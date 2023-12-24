<?php
session_start();

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
    <title>Online-Shop</title>
</head>

<body>
    <div><a href="index.php">back</a></div>
    <div>
        <?php
        if (isset($_SESSION["update"])) {
        ?>
            <h4><?php echo $_SESSION["update"] ?></h4>
        <?php
            unset($_SESSION["update"]);
        } ?>

    </div>
    <div>
        <?php

        echo "<h2> " . $prod['name'] . " </h2>";
        echo "<h5> price: " . $prod['price'] . " </h5>";
        echo "<p> " . $prod['desc'] . " </p>";

        ?>
        <?php if (isset($_SESSION['id'])) { ?>
            <a href="editProduct.php?id=<?php echo $prod['id']; ?>">edit</a>
            <a href="handlers/deleteProduct.php?id=<?php echo $prod['id']; ?>">delete</a>
            <hr>
        <?php } ?>
    </div>
</body>

</html>