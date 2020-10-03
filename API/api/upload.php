<?php
require_once 'connection.php';
$image = $FILES['image']['name'];
$title = $POST['title'];

$imagePath = "./upload/".$image;

move_uploaded_file($FILES['image']['tmp_name'],$imagePath);
?>