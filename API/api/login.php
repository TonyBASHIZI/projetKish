<?php
require_once 'connection.php';
// require_once 'authentification.php';

// var_dump($_POST);
// die();

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    $query = "SELECT code_client, nom, post, tel, email, username, pwd, created_at, (select count(ref_pro) from t_likes left join t_approvision on t_approvision.id=ref_pro where ref_client=code_client) as countLike, (select count(bag.id) from bag where userID=code_client) as countCmd FROM t_client WHERE (username='".$username."' or tel='".$username."') AND pwd ='".$password."'";

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
    // echo($result)
    // ? json_encode($array)
    // : json_encode("data not found");
}

// $auth = new Athentification();
// $auth->login();

?>