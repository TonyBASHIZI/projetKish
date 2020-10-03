<?php

include_once 'connection.php';

class SelectAll {



    public function select($query){

        if(Constants::connect() != null){

            $result = Constants::connect()->query($query);
            // var_dump($result);

            if ($result->num_rows > 0) {

                $array = array();

                while ($row=$result->fetch_assoc()) {

                   array_push($array, $row);
                  

                }

                 print(json_encode($array));

            } else {

                print(json_encode("No data found"));

            }  

        }else {

            print(json_encode("Cannot connect to Database Server"));

        }

    }

}

$sql = "";

if ($_GET['value'] == 'vente') {

    $sql = 'SELECT mouvement.id, mouvement.ref_art, libeleMvt, typeMvt, nbrpieces qte, prix_gros, prix_u, typepaie, date_mvt, case when typeMvt="Detail" then (nbrpieces*prix_u) else case when typeMvt="En gros" then (nbrpieces*prix_gros) end end as prix_tot, nom, tel from mouvement left join utilisateurs on utilisateurs.tel=mouvement.ref_agent order by id desc;';
    // var_dump($sql);
}

else if($_GET['value'] == 'client'){

  $sql="SELECT id, concat(nom, ' ', prenom) nomClient, tel, adresse from client_fidele;";
//   var_dump($sql);

}

else if($_GET['value'] == 'articles'){

  $sql="SELECT code_art, designation, nbpieces, fss, provenance, prix_u, prix_gros, (prix_u*nbpieces) prix_tot, updated_at from article order by updated_at desc;";
  var_dump($sql);
}

$delivery = new SelectAll();

$delivery->select($sql);
// var_dump($delivery);die();



?>