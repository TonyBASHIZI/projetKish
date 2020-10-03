<?php
       $p =  \App\App::getInstance()->getTable('provision')->all();
?>  
  
  <section class="page--header">
      <body onload="print()">
     <div class="col-md-8">
                      
                    </div>
                    <div class="panel">
                    <div class="records--list" data-title="STOCK FAIBLE">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="not-sortable">Image</th>
                                    <th class="not-sortable">Image 2</th>
                                    <th class="not-sortable">Image 3</th>
                                    <th>Product code</th>
                                    <th>Designation</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($p as $v): ?>
                                
                                  <tr>  
                                  
                                    <td> <a href="#" class="btn-link"><?=$v->id ?></a> </td>
                                   <td> <a href="#" class="btn-link"> <img src="../imgtout/<?=$v->image?>"
                                                alt=""> </a> </td>
                                     <td> <a href="#" class="btn-link"> <img src="../imgtout/<?=$v->image2?>"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="../imgtout/<?=$v->image3?>"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link"><?=$v->design_produit ?></a> </td>
                                    <td> <a href="#" class="btn-link"><?=$v->categorie ?></a> </td>
                                    <td>$<?=$v->prix_ui ?></td>
                                    <td>
                                        <?php
                                         if($v->qte > 0 && $v->qte < 20){
                                        
                                           echo "<span style='color:red;font-size:20px;'>Stock insuffisant'</span>'";
                                             
                                             }
                                             else{
                                                echo ''.$v->qte;
                                             }
                                        
                                    ?>
                                    
                                    </td>
                                    
                                    <td><?=$v->created_at ?></td>
                                    <td><span class="label label-success">Approvisionner</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> 
                                            <a href="index.php?p=edit&id=<?=$v->id ?>&det=<?=$v->detail?>&px=<?=$v->prix_ui?>&qte=<?=$v->qte?>&code=<?=$v->design_produit?>&fss=<?=$v->fss?>&cate=<?=$v->categorie?>" class="dropdown-item">Edit</a>  
                                               <a
                                                    href="index.php?p=post&det=<?=$v->detail?>&px=<?=$v->prix_ui?>&nom=<?=$v->design_produit?>" class="dropdown-item">Post</a>
                                                <a
                                                    href="index.php?p=dele&code=<?=$v->design_produit?>&det=<?=$v->detail?>&px=<?=$v->prix_ui?>&nom=<?=$v->design_produit?>" class="dropdown-item">Delete</a> </div>
                                        </div>
                                    </td>
                                </tr>

                                
                                <?php endforeach ?>
                                
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                </body>

  </section>
 