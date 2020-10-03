<?php
require_once 'connection.php';

class UpdateAll
{
    $test = $_POST['test'];
    public fonction update()
    {
        if ($test == 'bag') 
        {
            $userID = $_POST['userID'];

            $query = "INSERT INTO bag (userID) VALUES (".$userID.")";

            $result = mysqli_query(Constants::connect(),$query);

            if ($result) {
                
                $sql = "SELECT MAX(id) as id FROM bag";
                $rs = mysqli_query($con,$sql);
                $values = array();

                while ($row = mysqli_fetch_assoc($rs)) {
                $values[] = $row;
            }
            echo($rs)
            ? json_encode($values)
            : json_encode(array("code" => 0, "message" => "data not found"));
            }
        } else if ($test == 'bag_detail')
        {
            $bagID = $_POST['bagID'];
            $productID = $_POST['productID'];
            $qty = $_POST['qty'];

            $query = "INSERT INTO bag_detail (bagID,productID,qty) VALUES (".$bagID.",".$productID.",".$qty.")";

            $result =mysqli_query(Constants::connect(),$query);

            echo($result)
            ? json_encode(array("code" => 1, "message" => "Save succes"))
            : json_encode(array("code" => 0, "message" => "Save error"));
        }
    }
}

?>