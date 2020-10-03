<?php 
 
   $prix = htmlspecialchars($_GET['px']);
   $de = htmlspecialchars($_GET['det']);
  $ida = htmlspecialchars($_GET['id']);
  $qte = htmlspecialchars($_GET['qte']);
  $nom = htmlspecialchars($_GET['nom']);
  $fss = htmlspecialchars($_GET['fss']);
   
  $p = \App\App::getInstance()->getTable('provision')->all();
      
       if(isset($_GET['id'])){

     $m = \App\App::getInstance()->getTable('provision')->findById($_GET['ida']);
    // var_dump($m);die();
    if($m) {

    }  else{
        header("location:index.php?p=produits");
     }
}
  

//EDIT article
if(isset($_POST['edit'])) {
    $filename  = $_FILES['image']['name'];
                 $filetmpname = $_FILES['image']['tmp_name'];
                    $folder='../ressouces/views/admin/pages/imgload/';
                 move_uploaded_file($filetmpname, $folder.$filename);
  
   // var_dump($ma);die();
    $d = \App\App::getInstance()->getTable('provision')->findById($_GET['ida']);
    $ch = \App\App::getInstance()->getTable('provision')
        ->update($d->id, [
         // var_dump($d);die();

            // 'design_produit' => htmlspecialchars($_GET['nom']),
             // 'detail' => htmlspecialchars($_GET['det']),
              'qte' => $qte,
             // 'fss' => htmlspecialchars($_GET['fss']),
             // 'prix_ui' => htmlspecialchars($_GET['px'])           
            
        ], 'id');

    if($ch) {
        header("location:index.php?p=produits");
    } else{
       $error_message = "Mis en jour modification echouer";
    }
}


?>

<section class="page--header">
               
            </section>
            <section class="main--content">
                <div class="panel">
                    <div class="records--header">
                        <div class="title fa-shopping-bag">
                            <h3 class="h3">Ecommerce Products <a href="#" class="btn btn-sm btn-outline-info">Edit
                                    Products</a></h3>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="records--body">
                        <div class="title">
                         <h6 class="h6">Detail Produit</h6> <a href="#" class="btn btn-rounded btn-danger"></a>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="nav-item"> <a href="#tab01" data-toggle="tab" class="nav-link active">Approvisionner</a>
                            </li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab01">
                             <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Code
                                            Produit : *</span>
                                        <div class="col-md-9"> 
                                 <input type="text" name="name" value="<?=$nom ?>" class="form-control"
                                                required>
                                                 </div>
                                    </div>
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Long
                                            Description :</span>
                                        <div class="col-md-9">
                                         <textarea type="text" value="" name="detail" class="form-control">
                                             <?=$de ?>
                                         </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Prix
                                            Produit: *</span>
                                        <div class="col-md-9"> 
                                            <input type="text" name="prix" value="<?=$prix ?>" class="form-control"
                                                required> </div>
                                    </div>
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Categorie:</span>
                                        <div class="col-md-9">
                                         <input type="text" name="cat" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Quantité:</span>
                                        <div class="col-md-9"> <input type="text" value="<?=$qte ?>" name="qte" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Fournisseur :</span>
                                        <div class="col-md-9"> <input type="text" value="<?=$fss ?>" name="fss" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Image :</span>
                                        <div class="col-md-9">
                                         <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                 <div class="col-md-9 offset-md-3"> 
                                    <input type="submit" name="edit" value="Update"
                                                class="btn btn-rounded btn-success"> </div>
                                    </div>
                                </form>
                            <div class="tab-pane fade" id="tab03">
                                 <?php
               if(isset($errors)){
                echo ''.$errors;
               }
                 
              ?>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="panel">
                    <div class="records--list" data-title="Product Listing">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="not-sortable">Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
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
                                    <td> <a href="#" class="btn-link"> <img src="../ressouces/views/admin/pages/imgload/<?=$v->image?>"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link"><?=$v->design_produit ?></a> </td>
                                    <td> <a href="#" class="btn-link"><?=$v->categorie ?></a> </td>
                                    <td>$<?=$v->prix_ui ?></td>
                                    <td><?=$v->qte ?></td>
                                    <td><?=$v->created_at ?></td>
                                    <td><span class="label label-success">Approvisionner</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a href="index.php?p=edit&id=<?=$v->id ?>&det=<?=$v->detail?>&px=<?=$v->prix_ui?>&qte=<?=$v->qte?>&nom=<?=$v->design_produit?>&fss=<?=$v->fss?>" class="dropdown-item">Edit</a> 
                                               <a
                                                    href="index.php?p=post&det=<?=$v->detail?>&px=<?=$v->prix_ui?>&nom=<?=$v->design_produit?>" class="dropdown-item">Post</a>
                                                <a
                                                    href="#" class="dropdown-item">Delete</a> </div>
                                        </div>
                                    </td>
                                </tr>

                                
                                <?php endforeach ?>
                                
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>