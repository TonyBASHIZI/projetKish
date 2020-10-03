<?php 
     // $p =  \App\App::getInstance()->getTable('provision')->all();
     $p = \App\App::getInstance()->getTable('produit')->all();
      // var_dump($c);die();
     $x = 0;
     $min=1;
     $max=1000;
     $x = rand($min,$max);
    
    if(isset($_POST['submit']))
    {
    
         $add = \App\App::getInstance()->getTable('produit')
         ->save([
              'code_produit' => $_POST['code'],
              'design_produit' => $_POST['designation']
         ]);

         if($add){
            
          header("location:index.php?p=produits");
         }
    }
    
?>

<section class="main--content">
                <div class="panel">
                    <div class="records--header">
                        <div class="title fa-shopping-bag">
                            <h3 class="h3">Nouveaux Produits <a href="#" class="btn btn-sm btn-outline-info">NYIRAGONGO</a></h3>
                            
                        </div>
                        <div class="actions">
                            <form action="" method ="POST" class="search flex-wrap flex-md-nowrap"> 
                               <input type="text" name="code" value="M00-M-<?=$x?>-MG" class="form-control"
                                    placeholder="Product code..." required> 
                                <input type="text" name="designation" class="form-control"
                                    placeholder="Product Name..." required> 
                                <!--    <select name="choix" id="choix" class="form-control">-->

                                <!--</select> -->
  
                                <button  type="submit" name="submit" class="addProduct btn btn-lg btn-rounded btn-warning">Enregistrez</button></a>
                            </form> 

                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="records--list" data-title="Product Listing">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Designation Produit</th>
                                    <th>Date ajout</th>
                                    <th>Status</th>
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($p as $v): ?>
                                  <tr>
                                    <td> <a href="#" class="btn-link"><?=$v->code_produit ?></a> </td>
                                    
                                    <td> <a href="#" class="btn-link"><?=$v->design_produit ?></a> </td>
                                    <!--<td> <a href="#" class="btn-link"><?=$v->cat_produit ?></a> </td>-->
                                    
                                    <td><?=$v->created_at ?></td>
                                    
                                    <td><span class="label label-success">Disponnible</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a href="index.php?p=provision&code=<?=$v->code_produit ?>&design=<?=$v->design_produit ?>&cat<?=$v->cat_produit ?>" class="dropdown-item">Ajouter</a> 
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