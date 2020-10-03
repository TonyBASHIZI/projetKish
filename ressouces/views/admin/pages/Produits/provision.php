 <?php

    $code = htmlspecialchars($_GET['code']);
    $desi = htmlspecialchars($_GET['design']);
    $cat = htmlspecialchars($_GET['cat']);
    $p =  \App\App::getInstance()->getTable('provision')->all();
    if (isset($_POST['submit'])) {

        $filename  = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $folder = '../imgtout/';
        move_uploaded_file($filetmpname, $folder . $filename);

        $filenames .= $filename;


        $filename2  = $_FILES['image2']['name'];
        $filetmpname2 = $_FILES['image2']['tmp_name'];
        $folder2 = '../imgtout/';
        move_uploaded_file($filetmpname2, $folder2 . $filename2);
        $filenames2 .= $filename2;


        $filename3  = $_FILES['image3']['name'];
        $filetmpname3 = $_FILES['image3']['tmp_name'];
        $folder3 = '../imgtout/';
        move_uploaded_file($filetmpname3, $folder3 . $filename3);

        $filenames3 .= $filename3;


        $add = \App\App::getInstance()->getTable('provision')
            ->save([
                'design_produit' => $_POST['name'],
                'detail' => $_POST['detail'],
                'qte' => $_POST['qte'],
                'fss' => $_POST['fss'],
                'last_price' => $_POST['last_price'],
                'prix_ui' => $_POST['prix'],
                'image' => $filename,
                'image2' => $filename2,
                'image3' => $filename3,
                'categorie' => $_POST['choix']
            ]);

        if ($add) {
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


            $data = 'Insertion nouveau produit';
            $pusher->trigger('my-channel', 'my-event', $data);

            header("location:index.php?p=livraison");
        }
    }
    ?>



 <section class="page--header">

     <script src="https://js.pusher.com/5.0/pusher.min.js">


     </script>
     <script>
         // Enable pusher logging - don't include this in production
         Pusher.logToConsole = true;

         var pusher = new Pusher('69738a1a74a545651052', {
             cluster: 'ap2',
             forceTLS: true
         });

         var channel = pusher.subscribe('my-channel');
         channel.bind('my-event', function(data) {
             alert(JSON.stringify(data));
         });
     </script>
     <section class="main--content">
         <div class="panel">
             <div class="records--header">
                 <div class="title fa-shopping-bag">
                     <h3 class="h3">Nyiragongo immobiliers </h3>
                 </div>
             </div>
         </div>
         <div class="panel">
             <div class="records--body">
                 <div class="title">
                     <h6 class="h6">Formulaire des immobiliers :


                     </h6>
                 </div>
                 <ul class="nav nav-tabs">
                     <li class="nav-item"> <a href="#tab01" data-toggle="tab" class="nav-link active">Approvisionner</a>
                     </li>

                 </ul>
                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="tab01">
                         <form action="" method="POST" enctype="multipart/form-data">
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Code
                                     produit: *</span>
                                 <div class="col-md-9">
                                     <input type="text" name="name" value="<?= $code ?>" class="form-control" required>
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Long
                                     Description:</span>
                                 <div class="col-md-9">
                                     <textarea type="text" name="detail" class="form-control"><?= $desi ?></textarea>
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Dernier
                                     Prix: *</span>
                                 <div class="col-md-9">
                                     <input type="text" name="last_price" class="form-control" required> </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Nouveau
                                     Prix: *</span>
                                 <div class="col-md-9">
                                     <input type="text" name="prix" class="form-control" required> </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Categorie:</span>
                                 <div class="col-md-9">

                                     <select name="choix" id="choix" class="form-control">
                                         <option value="" selected><?= $cat ?></option>

                                         <option value="HOTEL">HOTEL</option>
                                         <option value="BATIMENT">BATIMENT</option>
                                         <option value="APPARTEMENT">APPARTEMENT</option>
                                         <option value="BOUTIQUE">BOUTIQUE</option>
                                         <option value="SALLE">SALLE</option>
                                         
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Quantité :</span>
                                 <div class="col-md-9"> <input type="text" name="qte" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Fournisseur :</span>
                                 <div class="col-md-9"> <input type="text" name="fss" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Image profile :</span>
                                 <div class="col-md-9">
                                     <input type="file" name="image" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Image 2 :</span>
                                 <div class="col-md-9">
                                     <input type="file" name="image2" class="form-control">
                                 </div>
                             </div>
                             <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Image 3 :</span>
                                 <div class="col-md-9">
                                     <input type="file" name="image3" class="form-control">
                                 </div>
                             </div>


                             <div class="row mt-3">
                                 <div class="col-md-9 offset-md-3">
                                     <input type="submit" name="submit" value="Valider" class="btn btn-rounded btn-success"> </div>
                             </div>
                         </form>
                         <div class="tab-pane fade" id="tab03">

                         </div>
                     </div>
                 </div>
             </div>
             <div class="panel">
                 <div class="records--list" data-title="Liste des immobiliers">
                     <table id="recordsListView">
                         <thead>
                             <tr>
                                 <th>ID</th>
                                 <th class="not-sortable">Image</th>
                                 <th class="not-sortable">Image2</th>
                                 <th class="not-sortable">Image3</th>
                                 <th>Code</th>
                                 <th>Designation</th>
                                 <th>Prix</th>
                                 <th>Quantité</th>
                                 <th>Date d'ajout</th>
                                 <th>Status</th>
                                 <th class="not-sortable">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($p as $v) : ?>
                                 <tr>
                                     <td> <a href="#" class="btn-link"><?= $v->id ?></a> </td>
                                     <td> <a href="#" class="btn-link"> <img src="../imgtout/<?= $v->image ?>" alt=""> </a> </td>
                                     <td> <a href="#" class="btn-link"> <img src="../imgtout/<?= $v->image2 ?>" alt=""> </a> </td>
                                     <td> <a href="#" class="btn-link"> <img src="../imgtout/<?= $v->image3 ?>" alt=""> </a> </td>
                                     <td> <a href="#" class="btn-link"><?= $v->design_produit ?></a> </td>
                                     <td> <a href="#" class="btn-link"><?= $v->detail ?></a> </td>
                                     <td>$<?= $v->prix_ui ?></td>
                                     <td><?= $v->qte ?></td>
                                     <td><?= $v->created_at ?></td>
                                     <td><span class="label label-success">Approvisionner</span> </td>
                                     <td>
                                         <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                             <div class="dropdown-menu">
                                                 <a href="index.php?p=edit&id=<?= $v->id ?>&img1=<?= $v->image ?>&img2=<?= $v->image2 ?>&img3=<?= $v->image3 ?>&det=<?= $v->detail ?>&px=<?= $v->prix_ui ?>&qte=<?= $v->qte ?>&nom=<?= $v->design_produit ?>&fss=<?= $v->fss ?>" class="dropdown-item">Edit</a>
                                                 <a href="index.php?p=post&det=<?= $v->detail ?>&px=<?= $v->prix_ui ?>&nom=<?= $v->design_produit ?>" class="dropdown-item">Edit image</a>
                                                 <a href="#" class="dropdown-item">Delete</a> </div>
                                         </div>
                                     </td>
                                 </tr>


                             <?php endforeach ?>




                         </tbody>
                     </table>
                 </div>
             </div>
     </section>