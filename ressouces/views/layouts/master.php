<!DOCTYPE html>
<html lang="en" class="no-outlines">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NYIRAGONGO Admin</title>
    <meta name="author" content="">
    <meta name="description" content="tonybash5@gmail.com">
    <meta name="keywords" content="">
    <link rel="icon" href="../favicon.png" type="../image/png">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/morris.min.css">
    <link rel="stylesheet" href="../assets/css/select2.min.css">
    <link rel="stylesheet" href="../assets/css/jquery-jvectormap.min.css">
    <link rel="stylesheet" href="../assets/css/horizontal-timeline.min.css">
    <link rel="stylesheet" href="../assets/css/weather-icons.min.css">
    <link rel="stylesheet" href="../assets/css/dropzone.min.css">
    <link rel="stylesheet" href="../assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="../assets/css/ion.rangeSlider.skinFlat.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/fullcalendar.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="wrapper">
        <header class="navbar navbar-fixed">
            <div class="navbar--header"> <a href="index.php?p=welcome" class="logo">
                    <img src="../assets/img/avatars/logoKis.jpeg" alt="" style="height: 55px;width:100px;margin-left:10px;"> </a>
                <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar"> <i class="fa fa-bars"></i>
                </a> </div>
            <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
                <i class="fa fa-bars"></i>
            </a>
            <div class="navbar--search">
                <form action=""> <input type="search" name="search" class="form-control" placeholder="Search Something..." required> <button class="btn-link"><i class="fa fa-search"></i></button> </form>
            </div>
            <div class="navbar--nav ml-auto">
                <ul class="nav">
                    <li class="nav-item"> <a href="#" class="nav-link"> <i class="fa fa-bell"></i> <span class="badge text-white bg-blue">7</span>
                        </a> </li>
                    <li class="nav-item"> <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" class="nav-link"> <i class="fa fa-envelope"></i>
                            <span class="badge text-white bg-blue">0</span> </a> </li>
                    <li class="nav-item dropdown nav-language"> <a href="#" class="nav-link" data-toggle="dropdown">
                            <a href="#"> <img src="../assets/img/flags/fr.png" alt=""> <span>French</span> <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">

                            </ul>
                    </li>
                    <li class="nav-item dropdown nav--user online"> <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="../assets/img/avatars/EmptyContact@2x.png" alt="" class="rounded-circle"> <span>NYIRAGONGO</span> <i class="fa fa-angle-down"></i> </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="far fa-user"></i>Profile</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="index.php?p=logout"><i class="fa fa-lock"></i>Lock Screen</a></li>
                            <li><a href="index.php?p=logout"><i class="fa fa-power-off"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar" data-trigger="scrollbar">
            <div class="sidebar--profile">
                <!-- <div class="profile--img"> <a href="profile.html"> <img src="../assets/img/avatars/EmptyContact@2x.png" alt=""
                            class="rounded-circle"> </a> </div> -->
                <div class="profile--name"> <a href="" class="btn-link">NYIRAGONGO</a> </div>
                <div class="profile--nav">
                    <ul class="nav">
                        <li class="nav-item"> <a href="#" class="nav-link" title="User Profile"> <i class="fa fa-user"></i>
                            </a> </li>
                        <li class="nav-item"> <a href="index.php?p=logout" class="nav-link" title="Lock Screen"> <i class="fa fa-lock"></i>
                            </a> </li>
                        <li class="nav-item"> <a href="index.php?p=logout" class="nav-link" title="Logout"> <i class="fa fa-sign-out-alt"></i>
                            </a> </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar--nav">
                <ul>
                    <li>
                        <ul>
                            <li class="active"> <a href="index.php?p=welcome"> <i class="fa fa-home"></i> <span>Dashboard</span>
                                </a> </li>
                            <li> <a href="#"> <i class="fa fa-shopping-cart"></i> <span>Ecommerce</span> </a>
                                <ul>
                                    <!--<li><a href="index.php?p=categorie">Categories</a></li>-->
                                    <li><a href="index.php?p=produits">Produits</a></li>
                                    <li><a href="index.php?p=livraison">Stock</a></li>
                                    <li><a href="index.php?p=livraison">Provisions</a></li>
                                    <li><a href="index.php?p=user">Utilisateurs</a></li>
                                    <li><a href="index.php?p=commande">Commandes</a></li>
                                    <li><a href="index.php?p=alert">Alertes produits</a></li>
                                    <li><a href="index.php?p=paie">Paiements</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li> <a href="#">Configurations</a>
                        <ul>
                            <li> <a href="#"> <i class="fa fa-file"></i> <span>Authentification</span> </a>
                                <ul>

                                    <li><a href="index.php?p=logout">Login</a></li>


                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="sidebar--widgets">

            </div>
        </aside>
        <main class="main--container">


            <?= $content ?>

            <footer class="main--footer main--footer-light">
                <p>for 24Bio</p>
            </footer>
        </main>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/jquery.sparkline.min.js"></script>
    <script src="../assets/js/raphael.min.js"></script>
    <script src="../assets/js/morris.min.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/jquery-jvectormap.min.js"></script>
    <script src="../assets/js/jquery-jvectormap-world-mill.min.js"></script>
    <script src="../assets/js/horizontal-timeline.min.js"></script>
    <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../assets/js/jquery.steps.min.js"></script>
    <script src="../assets/js/dropzone.min.js"></script>
    <script src="../assets/js/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <?php
    if (isset($message)) {

        echo "<script type='text/javascript'>alert('Mis en stock effectué');</script>";
    }
    ?>

</body>


</html>