<?php
    // $cmpt = \App\App::getInstance()->getTable('like')->count();
    // var_dump($cmpt);die();
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'root';
    $db_name = 'c1144147c_yakuuwa_db';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

    $result = $mysqli->query("SELECT COUNT(*) AS nb FROM t_approvision")->fetch_array();
    $resultuser = $mysqli->query("SELECT COUNT(*) AS nbuser FROM t_user")->fetch_array();
    $likes = $mysqli->query("SELECT COUNT(*) AS nblikes FROM t_likes")->fetch_array();
    $cmd = $mysqli->query("SELECT COUNT(*) AS nbbag FROM bag")->fetch_array();
    $cl = $mysqli->query("SELECT COUNT(*) AS nbcl FROM t_client")->fetch_array();

?>


 <section class="page--header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="page--title h5">Administration Dashboard</h2>
                           
                        </div>
                        <div class="col-lg-6">
                            <div class="summary--widget">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main--content">
                <div class="row gutter-20">
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                   
                                    <p class="miniStats--label text-white bg-blue"> <i class="fa fa-level-up-alt"></i>
                                        <span>%</span> </p>
                                </div>
                                <div class="miniStats--body"> <i class="miniStats--icon fa fa-user text-blue"></i>
                                    <p class="miniStats--caption text-blue"></p>
                                    <h3 class="miniStats--title h4">Total likes</h3>
                                    
                                    <p class="miniStats--num text-blue"><?=$likes['nblikes']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                   
                                    <p class="miniStats--label text-white bg-orange"> <i class="fa fa-level-down-alt"></i>
                                        <span>%</span> </p>
                                </div>
                                <div class="miniStats--body"> <i class="miniStats--icon fa fa-ticket-alt text-orange"></i>
                                    
                                    <h3 class="miniStats--title h4">Total produits</h3>
                                    <p class="miniStats--num text-orange"><?=$result['nb']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                    
                                </div>
                                <div class="miniStats--body"> <i class="miniStats--icon fa fa-rocket text-green"></i>
                                    <p class="miniStats--caption text-blue"></p>
                                    <p class="miniStats--caption text-green">%</p>
                                    <h3 class="miniStats--title h4">Totale commande</h3>
                                    <p class="miniStats--num text-green"><?=$cmd['nbbag']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                    
                                    <p class="miniStats--label text-white bg-green"> <i class="fa fa-level-up-alt"></i>
                                        <span>0%</span> </p>
                                </div>
                                <div class="miniStats--body"> <i class="miniStats--icon fa fa-envelop text-green"></i>
                                  
                                    <h3 class="miniStats--title h4">Nombre des administrateurs</h3>
                                    <p class="miniStats--num text-green"><?=$resultuser['nbuser']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                    
                                    <p class="miniStats--label text-white bg-green"> <i class="fa fa-level-up-alt"></i>
                                        <span>0%</span> </p>
                                </div>
                                <div class="miniStats--body"> <i class="miniStats--icon fa fa-envelop text-green"></i>
                                  
                                    <h3 class="miniStats--title h4">Nombre des clients</h3>
                                    <p class="miniStats--num text-green"><?=$cl['nbcl']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </select>
                 