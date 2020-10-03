 <?php
  
     $al = \App\App::getInstace()->getTable('post')->all();

      if (isset($_POST['submit'])) {
          
          $prix = htmlspecialchars($_GET['px']);
          $de = htmlspecialchars($_GET['det']);
          $nom = htmlspecialchars($_GET['nom']);

     $p = \App\App::getInstace()->getTable('post')
     ->save([
           'code_produit' => $nom,
           'detail' => $de,
           'prix' => $prix
     ]);

     if($p){
         
         header("location:index.php?p=post");
 
     }else{
        header("location:index.php?p=produits");
     }


      }
       
     


 ?>

  <section class="page--header">
     <div class="col-md-8">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Publication des produits</h3>
                            </div>
                            <div class="panel-content pt-5">
                                <form action="" method="">
                                    <div class="form-inline"> 
                                    <label class="mr-3 mb-3"> 
                                        <span class="label-text sr-only">CODE PRODUIT :</span> 
                                            <input type="text" value ="<?=$nom?>" name="code" placeholder="code."
                                            class="form-control">
                                             </label> 
                                             <label class="mr-3 mb-3"> 
                                                <span class="label-text sr-only">DETAIL PRODUIT :</span>
                                        <input type="text" name="name" value="<?=$de?>" placeholder="detail  :"  class="form-control">
                                        </label> 
                                        <label class="mr-3 mb-3"> 
                                                <span class="label-text sr-only">PRIX PRODUIT :</span>
                                        <input type="text" value="<?=$prix?>" name="prix" placeholder="prix :"  class="form-control">
                                        </label> <br>
                                        
                                <input type="submit"
                                        value="Valider" class="btn btn-sm btn-rounded btn-success mr-2 mb-3">
                                    <button
                                        type="button" class="btn btn-sm btn-rounded btn-outline-secondary mb-3">Cancel</button>
                                </div>
                                </form>
                                
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
                                <tr>
                                    <td> <a href="#" class="btn-link">#315321</a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="../assets/img/products/thumb-80x60.jpg"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link">Baby Dress</a> </td>
                                    <td> <a href="#" class="btn-link">Baby Products</a> </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td> <span class="label label-success">Approved</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a href="#" class="dropdown-item">Edit</a> <a
                                                    href="#" class="dropdown-item">Delete</a> </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="btn-link">#315321</a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="assets/img/products/thumb-80x60.jpg"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link">Baby Dress</a> </td>
                                    <td> <a href="#" class="btn-link">Baby Products</a> </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td> <span class="label label-warning">Not Published</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a href="#" class="dropdown-item">Edit</a> <a
                                                    href="#" class="dropdown-item">Delete</a> </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <a href="#" class="btn-link">#315321</a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="../assets/img/products/thumb-80x60.jpg"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link">Baby Dress</a> </td>
                                    <td> <a href="#" class="btn-link">Baby Products</a> </td>
                                    <td>$12.00</td>
                                    <td>1</td>
                                    <td>12 June 2017</td>
                                    <td> <span class="label label-danger">Deleted</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a href="#" class="dropdown-item">Edit</a> <a
                                                    href="#" class="dropdown-item">Delete</a> </div>
                                        </div>
                                    </td>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

  </section>
 