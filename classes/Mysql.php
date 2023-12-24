<?php


class Mysql
{
    private $server_name = "localhost";
    private $user_name = "root";
    private $password = "";
    private $db_name = "shop";

    protected function connect()
    {
        $conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);

        if ($conn->connect_error) {
            die("falid to connect with datebase " . $conn->connect_error);
        }
        return $conn;
    }
}
