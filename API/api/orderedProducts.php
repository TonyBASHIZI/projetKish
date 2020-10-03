<?php
require_once 'connection.php';

if (!empty($_POST)) {
    $array = array();
    $userID = trim(htmlspecialchars($_POST['userID']));
    $query = "select bagID, t_approvision.id prodID, detail, prix_ui, categorie, oder_date, statut etat, qty qteCmd, image  from bag inner join bag_detail on bag.id=bag_detail.bagID inner join t_approvision on t_approvision.id=bag_detail.productID where bag.userID='$userID' order by bagID desc limit 10";
    $result = mysqli_query(Constants::connect(),$query);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
    }
    echo($result)
    ? json_encode($array)
    : json_encode("data not found");
}

?>