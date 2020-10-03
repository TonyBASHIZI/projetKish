<?php
include_once 'connection.php';
if (!empty($_POST)) {
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    $query = "SELECT * from users WHERE tel='".$username."' AND password ='".$password."'";

    $result = mysqli_query(Constants::connect(),$query);

    $array = array();
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        echo json_encode($array);
    }
    else{
        echo json_encode("data not found");
    }
}

?>