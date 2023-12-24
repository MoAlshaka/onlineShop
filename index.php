<?php
session_start();
require_once('classes/Product.php');

$product = new Product;
$products = $product->get_all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online-Shop</title>
</head>

<body>
    <div>
        <?php if (!isset($_SESSION['id'])) { ?>
            <a href="login.php">login</a>
        <?php } ?>
        <?php if (isset($_SESSION['id'])) { ?>
            <a href="createProduct.php">create product</a>
            <a href="handlers/logout.php">logout</a>
        <?php } ?>
    </div>
    <div>
        <?php
        if (isset($_SESSION["update"])) {
        ?>
            <h4><?php echo $_SESSION["update"] ?></h4>
        <?php
            unset($_SESSION["update"]);
        } ?>
        <?php
        if (isset($_SESSION["add"])) {
        ?>
            <h4><?php echo $_SESSION["add"] ?></h4>
        <?php
            unset($_SESSION["add"]);
        } ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
            <h4><?php echo $_SESSION["delete"] ?></h4>
        <?php
            unset($_SESSION["delete"]);
        } ?>
    </div>
    <div>
        <?php
        foreach ($products as $product) {
            echo "<h2> " . $product['name'] . " </h2>";
            echo "<h5> price: " . $product['price'] . " </h5>";
            echo "<p> " . $product['desc'] . " </p>";

        ?>
            <a href="showProduct.php?id=<?php echo $product['id']; ?>">show</a>
            <?php if (isset($_SESSION['id'])) { ?>
                <a href="editProduct.php?id=<?php echo $product['id']; ?>">edit</a>
                <a href="handlers/deleteProduct.php?id=<?php echo $product['id']; ?>">delete</a>
                <hr>
            <?php } ?>
        <?php } ?>
    </div>
</body>

</html>