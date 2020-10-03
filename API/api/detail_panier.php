<?php
require_once 'connection.php';

$bagID = $_POST['bagID'];
$productID = $_POST['productID'];
$qty = $_POST['qty'];

$query = "INSERT INTO bag_detail (bagID,productID,qty) VALUES (".$bagID.",".$productID.",".$qty.")";
//$query = "UPDATE t_approvision set qte=qte-1 where  id=".$productID.")";

$result =mysqli_query(Constants::connect(),$query);

echo($result)
? json_encode("Save succes")
: json_encode("Save error");

?>