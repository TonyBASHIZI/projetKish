<?php

$id = htmlspecialchars($_GET['id']);
$code = htmlspecialchars($_GET['code']);
$desi = htmlspecialchars($_GET['det']);
$cate = htmlspecialchars($_GET['cate']);
$lastprice = htmlspecialchars($_GET['lastprice']);
$prix = htmlspecialchars($_GET['px']);
$qte = htmlspecialchars($_GET['qte']);
$fss = htmlspecialchars($_GET['fss']);
$img1 = htmlspecialchars($_GET['img1']);
$img2 = htmlspecialchars($_GET['img2']);
$img3 = htmlspecialchars($_GET['img3']);
//$var_dump($image1);die();
$p =  \App\App::getInstance()->getTable('provision')->all();
if (isset($_POST['submit'])) {
    if (isset($_FILES['image']['name']) && empty($img1) && empty($_FILES['image']['name'])) {
        $filename  = $_FILES['image']['name'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $folder = '../imgtout/';
        move_uploaded_file($filetmpname, $folder . $filename);

        $filenames .= $filename;
    } else {

        $filename = $img1;
    }

    if (isset($_FILES['image']['name']) && empty($img2) && empty($_FILES['image']['name'])) {

        $filename2  = $_FILES['image2']['name'];
        $filetmpname2 = $_FILES['image2']['tmp_name'];
        $folder2 = '../imgtout/';
        move_uploaded_file($filetmpname2, $folder2 . $filename2);
        $filenames2 .= $filename2;
    } else {

        $filename2 = $img2;
    }

    if (isset($_FILES['image']['name']) && empty($img3) && empty($_FILES['image']['name'])) {
        // var_dump($filename2);die();
        $filename3  = $_FILES['image3']['name'];
        $filetmpname3 = $_FILES['image3']['tmp_name'];
        $folder3 = '../imgtout/';
        move_uploaded_file($filetmpname3, $folder3 . $filename3);

        $filenames3 .= $filename3;
    } else {

        $filename3 = $img3;
    }

    //var_dump($filename1);die();
    $add = \App\App::getInstance()->getTable('provision')
        ->update($id, [
            'design_produit' => $_POST['name'],
            'detail' => $_POST['detail'],
            'qte' => $_POST['qte'],
            'fss' => $_POST['fss'],
            'image' => $filename,
            'image2' => $filename2,
            'image3' => $filename3,
            'prix_ui' => $_POST['prix'],
            'last_price' => $_POST['last_price'],
            'categorie' => $_POST['choix']
        ]);



    if ($add) {


        header("location:index.php?p=livraison");
    }
} else if (isset($_POST['dele'])) {


    $d = \App\App::getInstance()->getTable('provision')->delete($id);
    if ($d) {

        header("location:index.php?p=livraison");
    }
}


?>

<section class="page--header">

</section>

<section class="main--content">
    <div class="panel">
        <div class="records--header">
            <div class="title fa-shopping-bag">
                <h3 class="h3">NYIRAGONGO<a href="#" class="btn btn-sm btn-outline-info">Modification produit</a></h3>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="records--body">
            <div class="title">
                <h6 class="h6">Detail produit</h6> <a href="#" class="btn btn-rounded btn-danger"></a>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item"> <a href="#tab01" data-toggle="tab" class="nav-link active">Stock edit</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab01">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Code
                                Produit: *</span>
                            <div class="col-md-9">
                                <input type="text" name="name" value="<?= $code ?>" class="form-control" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?= $id ?>">
                        <div class="form-group row"> <span class="label-text col-md-3 col-form-label">
                                Description:</span>
                            <div class="col-md-9">

                                <input type="text" name="detail" value=<?= $desi ?> class="form-control" required> </div>


                        </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Last
                        Price: *</span>
                    <div class="col-md-9">
                        <input type="text" name="last_price" value=<?= $lastprice ?> class="form-control" required> </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Prix
                        Product: *</span>
                    <div class="col-md-9">
                        <input type="text" name="prix" value=<?= $prix ?> class="form-control" required> </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Category:</span>
                    <div class="col-md-9">

                        <select name="choix" id="choix" class="form-control">
                            <option value="<?= $cate ?>" selected><?= $cate ?></option>
                            <option value="HOTEL">HOTEL</option>
                            <option value="BATIMENT">BATIMENT</option>
                            <option value="APPARTEMENT">APPARTEMENT</option>
                            <option value="BOUTIQUE">BOUTIQUE</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Quantité:</span>
                    <div class="col-md-9">
                        <input type="text" name="qte" value=<?= $qte ?> class="form-control">
                    </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Fournisseur :</span>
                    <div class="col-md-9">
                        <input type="text" name="fss" value=<?= $fss ?> class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <span class="label-text col-md-3 col-form-label">Image profile : <?= $img1 ?></span>
                    <div class="col-md-9">
                        <font color="red">*</font>
                        <input type="file" name="image" value="<?= $img1 ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Image 2 : <?= $img2 ?></span>
                    <div class="col-md-9">
                        <input type="file" name="image2" value="<?= $img2 ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row"> <span class="label-text col-md-3 col-form-label">Image 3 : <?= $img3 ?></span>
                    <div class="col-md-9">
                        <font color="red">*</font>
                        <input type="file" name="image3" value="<?= $img3 ?>" id="<?= $img3 ?>" selected="<?= $img3 ?>" class="form-control">
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-md-9 offset-md-3">
                        <font color="red">*</font>
                        <input type="submit" name="submit" value="Modifier" class="btn btn-rounded btn-success">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-9 offset-md-3">

                        <input type="submit" name="dele" id="dele" value="Suprimmer" class="btn btn-rounded btn-danger">


                    </div>


                </div>
                </form>
                <div class="tab-pane fade" id="tab03">

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="panel">
                    <div class="records--list" data-title="Product Listing">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="not-sortable">Image</th>
                                    <th class="not-sortable">Image 2</th>
                                    <th class="not-sortable">Image 3</th>
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
                                <?php foreach ($p as $v) : ?>
                                  <tr>  
                                    <td> <a href="#" class="btn-link"><?= $v->id ?></a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="../ressouces/views/admin/pages/imgload/<?= $v->image ?>"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="../ressouces/views/admin/pages/imgload/<?= $v->image2 ?>"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link"> <img src="../ressouces/views/admin/pages/imgload/<?= $v->image3 ?>"
                                                alt=""> </a> </td>
                                    <td> <a href="#" class="btn-link"><?= $v->design_produit ?></a> </td>
                                    <td> <a href="#" class="btn-link"><?= $v->categorie ?></a> </td>
                                    <td>$<?= $v->prix_ui ?></td>
                                    <td><?= $v->qte ?></td>
                                    <td><?= $v->created_at ?></td>
                                    <td><span class="label label-success">Approvisionner</span> </td>
                                    <td>
                                        <div class="dropleft"> <a href="#" class="btn-link" data-toggle="dropdown"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu"> <a href="index.php?p=edit&id=<?= $v->id ?>&det=<?= $v->detail ?>&px=<?= $v->prix_ui ?>&qte=<?= $v->qte ?>&code=<?= $v->design_produit ?>&fss=<?= $v->fss ?>" class="dropdown-item">Edit</a> 
                                               <a
                                                    href="index.php?p=post&det=<?= $v->detail ?>&px=<?= $v->prix_ui ?>&nom=<?= $v->design_produit ?>" class="dropdown-item">Post</a>
                                                <a
                                                    href="index.php?p=dele&code=<?= $v->design_produit ?>&det=<?= $v->detail ?>&px=<?= $v->prix_ui ?>&nom=<?= $v->design_produit ?>" class="dropdown-item">Delete</a> </div>
                                        </div>
                                    </td>
                                </tr>

                                
                                <?php endforeach ?>
                                
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div> -->
</section>