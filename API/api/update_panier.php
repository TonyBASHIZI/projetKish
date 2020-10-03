<?php
require_once 'connection.php';

$userID = $_POST['userID'];
$total = $_POST['total'];

$query = "INSERT INTO bag (userID, total) VALUES (".$userID.",".$total.")";

$result = mysqli_query(Constants::connect(),$query);

if ($result) {
    $sql = "SELECT COALESCE(MAX(id),0) as id FROM bag where userID='".$userID."'";
    $rs = mysqli_query(Constants::connect(),$sql);
    $values = array();

    while ($row = mysqli_fetch_assoc($rs)) {
    $values[] = $row;
}

echo($rs)
? json_encode($values)
: json_encode(array("code" => 0, "message" => "data not found"));
}
    // $message = "PAIEMENT EFFECTUE TOTAL '".$total."' $ .ID CLIENT '".$userID."'";
    // $username = "tonytonn2019";
    // $password = "esm52030";
    // $sender = "24BIO";
    // $number = $_SESSION['admin'];
    
    // // ID 109
    // try {
    //     $url = "https://www.easysendsms.com/sms/bulksms-api/bulksms-api?username=";
    //     $url .= $username;
    //     $url .= "&password=";
    //     $url .= $password;
    //     $url .= "&from=";
    //     $url .= $sender;
    //     $url .= "&to=";
    //     $url .= $number;
    //     $url .= "&text=";
    //     $url .= urlencode($message);
    //     $url .= "&type=0";
    //     File($url);
        
    // } catch (Exception $E) {
    //     //throw $th;
    //     return $E->GetMessage();
    // }


?>