<?php
require_once 'connection.php';

$query = "SELECT * FROM product ORDER BY id DESC";

$result = mysqli_query(Constants::connect(),$query);

$array =array();

while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}
echo json_encode($array);
?>