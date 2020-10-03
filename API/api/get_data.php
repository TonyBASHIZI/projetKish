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
                           "last_price"=>$row['last_price'],
                           "fss"=>$row['fss'],
                           "prix_ui"=>$row['prix_ui'],
                           "image"=>$row['image'],
                           "image2"=>$row['image2'],
                           "image3"=>$row['image3'],
                           "categorie"=>$row['categorie'],
                           "detail"=>$row['detail'],
                           "qte"=>$row['qte'],
                           "ref_pro"=>$row['ref_pro'],
                           "ref_client"=>$row['ref_client'],
                           "countCmd"=>$row['countCmd'],
                           "countLike"=>$row['countLike'],
                           )
                        );
                    }
                } else if($_GET['value'] == 'category')
                {
                    while ($row=$result->fetch_array()) {
                       array_push($array, array(
                           "code_produit"=>$row['id'],
                           "design_produit"=>$row['designation'],
                           // "image"=>$row['image']
                           )
                        );
                    }
                }
                 print(json_encode($array));
            } else {
                print(json_encode("NOT FOUND !!! "));
            }  
        }else {
            print(json_encode("PHP EXCEPTION : CAN'T CONNECT TO MYSQL. NULL"));
        }
    }
}
$sql = '';
// if ($_GET['value'] == 'product' && (isset($_GET['userID']) && $_GET['userID']!=0)) {
//   $minID=$_GET['minID'];
//   $maxID=$_GET['maxID'];
//     $userID=$_GET['userID'];
//     $sql = 'SELECT t_approvision.id, last_price, design_produit, detail, qte, prix_ui, fss, image, image2, image3, categorie, case when ref_pro is null then "0" else ref_pro end as ref_pro, case when ref_client is null then "0" else case when (select ref_client from t_likes where ref_client='.$userID.' and ref_pro=t_approvision.id) then ref_client else "0" end  end as ref_client, (select count(productID) from bag_detail where productID=t_approvision.id) as countCmd, (select count(ref_pro) from t_likes where ref_pro=t_approvision.id) as countLike FROM t_approvision left join t_likes on t_likes.ref_pro=t_approvision.id left join bag_detail on bag_detail.productID=t_approvision.id where t_approvision.id>'.$minID.' and t_approvision.id<='.$maxID.' GROUP by t_approvision.id';
//     // print('all value given');
// }
if ($_GET['value'] == 'product' && (isset($_GET['userID']) && $_GET['userID']!=0)) {
  $minID=$_GET['minID'];
  $maxID=$_GET['maxID'];
    $userID=$_GET['userID'];
    $sql = 'SELECT t_approvision.id, last_price, design_produit, detail, qte, prix_ui, fss, image, image2, image3, categorie, case when ref_pro is null then "0" else ref_pro end as ref_pro, case when ref_client is null then "0" else case when (select ref_client from t_likes where ref_client='.$userID.' and ref_pro=t_approvision.id) then ref_client else "0" end  end as ref_client, (select count(productID) from bag_detail where productID=t_approvision.id) as countCmd, (select count(ref_pro) from t_likes where ref_pro=t_approvision.id) as countLike FROM t_approvision left join t_likes on t_likes.ref_pro=t_approvision.id left join bag_detail on bag_detail.productID=t_approvision.id GROUP by t_approvision.id order by RAND() limit 10';
    // print('all value given');
}
else if ($_GET['value'] == 'product' && (isset($_GET['type']) && $_GET['type']=='ordered')) {
    $sql = 'SELECT t_approvision.id,  last_price, design_produit, detail, qte, prix_ui, fss, image, image2, image3, categorie, case when ref_pro is null then "0" else ref_pro end as ref_pro, case when ref_client is null then "0" else case when (select ref_client from t_likes where ref_client="0" and ref_pro=t_approvision.id) then "0" else "0" end  end as ref_client, (select count(productID) from bag_detail where productID=t_approvision.id) as countCmd, (select count(ref_pro) from t_likes where ref_pro=t_approvision.id) as countLike FROM t_approvision left join t_likes on t_likes.ref_pro=t_approvision.id left join bag_detail on bag_detail.productID=t_approvision.id  GROUP by t_approvision.id ORDER BY countCmd DESC limit 10';
}
else if ($_GET['value'] == 'product' && (isset($_GET['type']) &&$_GET['type']=='liked')) {
    $sql = 'SELECT t_approvision.id,  last_price, design_produit, detail, qte, prix_ui, fss, image, image2, image3, categorie, case when ref_pro is null then "0" else ref_pro end as ref_pro, case when ref_client is null then "0" else case when (select ref_client from t_likes where ref_client="0" and ref_pro=t_approvision.id) then "0" else "0" end  end as ref_client, (select count(productID) from bag_detail where productID=t_approvision.id) as countCmd, (select count(ref_pro) from t_likes where ref_pro=t_approvision.id) as countLike FROM t_approvision left join t_likes on t_likes.ref_pro=t_approvision.id left join bag_detail on bag_detail.productID=t_approvision.id  GROUP by t_approvision.id ORDER BY countLike DESC limit 10';
}
else if($_GET['value'] == 'product')
{
    $minID=$_GET['minID'];
    $maxID=$_GET['maxID'];
    $sql = 'SELECT t_approvision.id,  last_price, design_produit, detail, qte, prix_ui, fss, image, image2, image3, categorie, case when ref_pro is null then "0" else ref_pro end as ref_pro, case when ref_client is null then "0" else case when (select ref_client from t_likes where ref_client="0" and ref_pro=t_approvision.id) then "0" else "0" end  end as ref_client, (select count(productID) from bag_detail where productID=t_approvision.id) as countCmd, (select count(ref_pro) from t_likes where ref_pro=t_approvision.id) as countLike FROM t_approvision left join t_likes on t_likes.ref_pro=t_approvision.id left join bag_detail on bag_detail.productID=t_approvision.id GROUP by t_approvision.id order by RAND() limit 10';
}

// else if($_GET['value'] == 'product')
// {
//     $minID=$_GET['minID'];
//     $maxID=$_GET['maxID'];
//     $sql = 'SELECT t_approvision.id,  last_price, design_produit, detail, qte, prix_ui, fss, image, image2, image3, categorie, case when ref_pro is null then "0" else ref_pro end as ref_pro, case when ref_client is null then "0" else case when (select ref_client from t_likes where ref_client="0" and ref_pro=t_approvision.id) then "0" else "0" end  end as ref_client, (select count(productID) from bag_detail where productID=t_approvision.id) as countCmd, (select count(ref_pro) from t_likes where ref_pro=t_approvision.id) as countLike FROM t_approvision left join t_likes on t_likes.ref_pro=t_approvision.id left join bag_detail on bag_detail.productID=t_approvision.id where t_approvision.id>'.$minID.' and t_approvision.id<='.$maxID.' GROUP by t_approvision.id';
// }
if ($_GET['value'] == 'category') {
    $sql = 'SELECT * FROM categorie ORDER BY id DESC';
}
$zakuuza = new SelectAll();
$zakuuza->select($sql);

?>