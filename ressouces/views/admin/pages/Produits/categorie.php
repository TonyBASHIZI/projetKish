<?php

 //$p =  \App\App::getInstance()->getTable('category')->all();
 //var_dump($p);die();
  
    if(isset($_POST['submit']))
    {
        $filename  = $_FILES['image']['name'];
                $filetmpname = $_FILES['image']['tmp_name'];
                   $folder='../public_html/imgtout/';
                move_uploaded_file($filetmpname, $folder.$filename);

                $filename .= $filename;

         $add = \App\App::getInstance()->getTable('category')
         ->save([
            'design_produit' => $_POST['designation'],
            'image' => $filename
            
         ]);

         if($add){
            // $message = 'Nouveau produit ajouté  dans le stock!!';
            // echo "<script type='text/javascript'>alert('$message');</script>";
            require __DIR__ . '/vendor/autoload.php';

            $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                '69738a1a74a545651052',
                'f6b25dc5be4c741dab48',
                '879234',
                $options
            );
  
            $data = 'Insertion nouvelle categorie okay';
            $pusher->trigger('my-channel', 'my-event', $data);

            header("location:index.php?p=approvision");

        }
    }
 

 
?>

<section class="main--content">
                <div class="panel">
                    <div class="records--header">
                        <div class="title fa-shopping-bag">
                            <h3 class="h3">Categories des produits</a></h3>
                            
                        </div>
                        <div class="actions">
                            <form action="" method ="POST" class="search flex-wrap flex-md-nowrap" enctype="multipart/form-data"> 
                                <input type="text" name="designation" placeholder="Designation" class="form-control" required>
                                <input type="file" name="image" class="form-control" required>

                                
                                <button  type="submit" name="submit" class="addProduct btn btn-lg btn-rounded btn-warning">Add category</button></a>
                            </form> 

                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="records--list" data-title="Product Listing">
                        <!--<table id="recordsListView">-->
                        <!--    <thead>-->
                        <!--        <tr>-->
                        <!--            <th>ID</th>-->
                        <!--            <th class="not-sortable">Image</th>-->
                                   
                        <!--            <th>Designation</th>-->
                        <!--            <th>Created Date</th>-->
                        <!--            <th class="not-sortable">Actions</th>-->
                        <!--        </tr>-->
                        <!--    </thead>-->
                        <!--    <tbody>-->
                        <!--        <?php foreach ($p as $v): ?>-->
                        <!--          <tr>-->
                        <!--            <td> <a href="#" class="btn-link"><?=$v->id ?></a> </td>-->
                        <!--            <td> <a href="#" class="btn-link"> <img src="../public_html/imgtout/<?=$v->image?>"-->
                        <!--                        alt=""> </a> </td>-->
                        <!--            <td> <a href="#" class="btn-link"><?=$v->designation ?></a> </td>-->
                        <!--            <td><?=$v->created_at ?></td>-->
                                    
                        <!--                <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i-->
                        <!--                            class="fa fa-ellipsis-v"></i></a>-->
                        <!--                    <div class="dropdown-menu"> <a href="" class="dropdown-item">Edit</a> -->
                                             
                        <!--                        <a-->
                        <!--                            href="#" class="dropdown-item">Delete</a> </div>-->
                        <!--                </div>-->
                        <!--            </td>-->
                        <!--        </tr>-->

                                
                        <!--        <?php endforeach ?>-->
                                
                                
                                
                                
                        <!--    </tbody>-->
                        <!--</table>-->
                    </div>
                </div>
                
</section>