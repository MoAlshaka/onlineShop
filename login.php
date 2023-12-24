<?php
session_start();
if (isset($_SESSION["id"])) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
        <form action="handlers/handleLogin.php" method="post">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="login" value="login">
        </form>
    </div>

</body>

</html>