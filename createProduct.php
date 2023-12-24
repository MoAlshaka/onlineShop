<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("location:login.php");
}

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
        <?php
        if (isset($_SESSION["errors"])) {
            foreach ($_SESSION["errors"] as $error) {
        ?>
                <p><?php echo $error ?></p>
        <?php
            }
            unset($_SESSION["errors"]);
        } ?>
    </div>
    <div>
        <form action="handlers/storeProduct.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" id="" placeholder="name">
            <textarea name="desc" id="" cols="30" rows="10"></textarea>
            <input type="number" name="price" id="">
            <input type="file" name="image" id="">
            <input type="submit" name="save" value="save">
        </form>
    </div>
</body>

</html>