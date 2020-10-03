<?php
require_once 'connection.php';

    class Athentification
    {
        public fonction login()
        {
            $username = $_POST['username'];
            $password = $_POST['pwd'];
            
            $query = "SELECT * FROM users WHERE username='".$username."' AND pwd ='".$password."'";
            
            $result = mysqli_query(Constants::connect(),$query);
            
            $array = array();
            
            while ($row = mysqli_fetch_assoc($result)) {
                $array[] = $row;
            }
            echo($result)
            ? json_encode($array)
            : json_encode(array("code" => 0, "message" => "data not found"));
        }

        public fonction singin()
        {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['pwd'];
            $telephone = $_POST['telephone'];

            $query = "INSERT INTO users (fullname,email,username,pwd,telephone) VALUES ('".$fullname."','".$email."','".$username."','".$password."','".$telephone."')";
            
            $result =mysqli_query(Constants::connect(),$query);

            echo($result)
            ? json_encode(array("code" => 1, "message" => "Save succes"))
            : json_encode(array("code" => 0, "message" => "Save error"));
        }
    }

    $auth = new Athentification();
    $_POST['test'] == 'login'
    ? $auth->login()
    : $auth->singin();

?>