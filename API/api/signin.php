<?php
require_once 'connection.php';
if (!empty($_POST)) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $telephone = $_POST['telephone'];

    $query = "INSERT INTO t_client (nom,username,pwd,tel) VALUES ('".$fullname."','".$username."','".$password."','".$telephone."')";

    $result =mysqli_query(Constants::connect(),$query);

    echo($result)
    ? json_encode(array("code" => 1, "message" => "Save succes"))
    : json_encode(array("code" => 0, "message" => "Save error"));
}

?>