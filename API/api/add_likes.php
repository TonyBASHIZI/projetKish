<?php
	require_once 'connection.php';

	$prodID = $_POST['prodID'];
	$clientID = $_POST['clientID'];
	$checkExists=mysqli_query(Constants::connect(), "select * from t_likes where ref_pro=".$prodID." and ref_client=".$clientID."");

	if(mysqli_num_rows($checkExists)>0)
	{
		echo json_encode("exists");
	}
	else
	{
		$query = "INSERT INTO t_likes (ref_pro, ref_client) VALUES (".$prodID.",".$clientID.")";
		$result = mysqli_query(Constants::connect(),$query);
		if($result)
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode("error");
		}
	}

?>