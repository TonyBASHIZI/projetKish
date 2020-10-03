<?php
      $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'c1144147c_yakuuwa_db';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if(isset($_POST['submit']))
    {
       $sql2 = "SELECT bag.id as CODECMD,bag.userID as REFCl,bag.oder_date as DATECMD,t_client.nom AS NOM,t_client.tel AS TEL,t_client.email AS EMAIL,bag_detail.qty as QTE, t_approvision.design_produit as CODEPRO,t_approvision.detail AS DESIGNPRO,t_approvision.prix_ui as PRIX_UI, (bag_detail.qty * t_approvision.prix_ui) as TOTAL, bag.statut as ETAT FROM `bag` INNER JOIN t_client on bag.userID = t_client.code_client
       INNER JOIN bag_detail on bag.id = bag_detail.bagID INNER JOIN t_approvision on bag_detail.productID = t_approvision.id WHERE statut ='En attente de paiement' ";
       $results2 = mysqli_query($mysqli,$sql2);
    }else{
        
          $sql2 = "SELECT bag.id as CODECMD,bag.userID as REFCl,bag.oder_date as DATECMD,t_client.nom AS NOM,t_client.tel AS TEL,t_client.email AS EMAIL,bag_detail.qty as QTE, t_approvision.design_produit as CODEPRO,t_approvision.detail AS DESIGNPRO,t_approvision.prix_ui as PRIX_UI, (bag_detail.qty * t_approvision.prix_ui) as TOTAL, bag.statut as ETAT FROM `bag` INNER JOIN t_client on bag.userID = t_client.code_client
          INNER JOIN bag_detail on bag.id = bag_detail.bagID INNER JOIN t_approvision on bag_detail.productID = t_approvision.id WHERE statut ='En attente de livraison' AND  date_Format(oder_date, '%Y-%m-%d') = date_Format(Now(), '%Y-%m-%d') ";
          $results2 = mysqli_query($mysqli,$sql2);
    }
 
   

 
?>  
  <body onload="print()">
    <section class="page--header">
     <div class="col-md-8">
                       
                    </div>
                    <div class="panel">
                    <div class="records--list" data-title="recentes commandes payées * paiements journaliers">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>CODE COMMANDE</th>
                                    
                                    <th>CODE CLIENT</th>
                                    <th>DATE COMMANDE</th>
                                    <th>NOM CLIENT</th>
                                    <th>TELEPHONE</th>
                                    <th>EMAIL</th>
                                    <th>QTE</th>
                                    <th>CODE PRODUIT</th>
                                    <th>DESIGNATION PRODUIT</th>
                                    <th>PRIX UI</th>
                                    <th>TOTAL</th>
                                    <th>ETAT</th>
                                   
                                    
                                    
                                    <!--<th class="not-sortable">Actions</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                
                             <?php 
                                    
                        
                                    while($rowitem = mysqli_fetch_array($results2)) {
                                    echo "<tr>";
                                        echo "<td>" . $rowitem['CODECMD'] . "</td>";
                                        echo "<td>" . $rowitem['REFCl'] . "</td>";
                                        echo "<td>" . $rowitem['DATECMD'] . "</td>";
                                        echo "<td>" . $rowitem['NOM'] . "</td>";
                                        echo "<td>" . $rowitem['TEL'] . "</td>";
                                        echo "<td>" . $rowitem['EMAIL'] . "</td>";
                                        echo "<td>" . $rowitem['QTE'] . "</td>";
                                        echo "<td>" . $rowitem['CODEPRO'] . "</td>";
                                        echo "<td>" . $rowitem['DESIGNPRO'] . "</td>";
                                        echo "<td>" . $rowitem['PRIX_UI'] . "</td>";
                                        echo "<td style='color:red;'>" . $rowitem['TOTAL'] . "$</td>";
                                        echo "<td>" . $rowitem['ETAT'] . "</td>";
                                    echo "</tr>";
                                    }
                                    ?>
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div><br><br>
                <div>
                    <form method="POST" action="">
                        
                       <p> <input type="submit" value="Print all" class="addProduct btn btn-lg btn-rounded btn-warning" name="submit">
                       <input type="submit" value="To day" class="addProduct btn btn-lg btn-rounded btn-warning" name="one"><p>
                        
                    </form>
                </div><br><br>
                <div class="container">
                    <form method="POST" action="">
                        <label>Date debut :</label>
                       <input type="Text" class="form-control" name="date1"  placeholder="Y-M-D" required>
                       
                       <label>Date fin :</label>
                       <input type="Text" class="form-control" name="date2"  placeholder="Y-M-D" required><br>
                        <p> <input type="submit" value="Print" class="addProduct btn btn-lg btn-rounded btn-warning" name="filter"></p>
                    </form>
                </div>
  </section>   
  
  </body>
  
 
 