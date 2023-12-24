<?php

require_once('Mysql.php');

class Admin extends Mysql
{
    public function attempt($email, $password)
    {
        $query = "SELECT * FROM admins 
        WHERE email = '$email'  AND `password` = '$password' ";
        $result = $this->connect()->query($query);
        $admin = null;
        if ($result->num_rows == 1) {
            $admin = $result->fetch_assoc();
        }
        return $admin;
    }
}
