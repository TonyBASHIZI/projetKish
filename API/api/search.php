<?php
include 'connection.php';
class SelectAll {

    public function select($query){
        if(Constants::connect() != null){
            $result = Constants::connect()->query($query);
            if ($result->num_rows > 0) {
                $array = array();
                if($_GET['value'] == 'product')
                {
                    while ($row=$result->fetch_array()) {
                       array_push($array, array(
                           "id"=>$row['id'],
                           "design_produit"=>$row['design_produit'],
                           "fss"=>$row['fss'],
                           "prix_ui"=>$row['prix_ui'],
                           "image"=>$row['image'],
                           "categorie"=>$row['categorie'],
                           "detail"=>$row['detail'],
                           "qte"=>$row['qte']
                           )
                        );
                    }
                } else if($_GET['value'] == 'category')
                {
                    while ($row=$result->fetch_array()) {
                       array_push($array, array(
                           "code_produit"=>$row['code_produit'],
                           "design_produit"=>$row['design_produit'],
                        //    "image"=>$row['image']
                           )
                        );
                    }
                }
                 

                 print(json_encode($array));
            } else {
                print(json_encode("Not found"));
            }  
        }else {
            print(json_encode("PHP EXCEPTION : CAN'T CONNECT TO MYSQL"));
        }
    }
}
$sql = "";
if ($_GET['value'] == 'product' && $_GET['searchValue']!='') {
    $searchValue=$_GET['searchValue'];
    $sql = "SELECT * FROM t_approvision where design_produit like '%".$searchValue."%' or detail like '%".$searchValue."%' or prix_ui like '%".$searchValue."%' or categorie like '%".$searchValue."%' ORDER BY id DESC";
    //$sql = "SELECT * FROM t_approvision where design_produit like '%2mg%' ORDER BY id DESC";
}
if ($_GET['value'] == 'category') {
    $sql = "SELECT * FROM t_produit ORDER BY code_produit DESC";
}
$zakuuza = new SelectAll();
$zakuuza->select($sql);

?>