<?php
   
      $p =  \App\App::getInstance()->getTable('provision')->all();
    //   $p = DB::table('t_approvision')->orderBy('id', 'desc')->get();
      
?>  
  
  <section class="page--header">
     <div class="col-md-8">
                        
                    </div>
                    <div class="panel">
                    <div class="records--list" data-title="Liste des produits">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="not-sortable">Image profile</th>
                                    <th class="not-sortable">Image 2</th>
                                    <th class="not-sortable">Image 3</th>
                                    <th>Code</th>
                                    <th>Designation</th>
                                    <th>Last price</th>
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
                                    <td> <a href="#" class="btn-link"><?=$v->detail ?></a> </td>
                                     <td>$<?=$v->last_price ?></td>
                                    <td>$<?=$v->prix_ui ?></td>
                                   <td style="background-color:#EDE7F5"> <?php
                                         if($v->qte >= 4 && $v->qte < 10){
                                        
                                           echo "<span style='color:red;font-size:20px;'>".$v->qte.'</span> Stock faible';
                                             
                                             }elseif($v->qte > 0 && $v->qte < 4){
                                        
                                                echo "<span style='color:red;font-size:20px;'>".$v->qte.'</span> Trop faible';
                                             
                                             }
                                             else{
                                                echo ''.$v->qte;
                                             }
                                        
                                    ?></td>
                                    
                                    <td><?=$v->created_at ?></td>
                                    <td><span class="label label-success">Approvisionner</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> 
                                            <a href="index.php?p=edit&id=<?=$v->id ?>&det=<?=$v->detail?>&px=<?=$v->prix_ui?>&lastprice=<?=$v->last_price?>&qte=<?=$v->qte?>&code=<?=$v->design_produit?>&fss=<?=$v->fss?>&cate=<?=$v->categorie?>&img1=<?=$v->image?>&img2=<?=$v->image2?>&img3=<?=$v->image3?>" class="dropdown-item">Edit product</a>  
                                             </div>
                                        </div>
                                    </td>
                                </tr>

                                
                                <?php endforeach ?>
                                
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>

  </section>
 