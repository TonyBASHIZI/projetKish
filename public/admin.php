<?php
use app\App;
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__)); 
require ROOT. "/app/App.php";
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'login';
}

$app = new DBAuth(App::getInstance()->getDB('user'));
//var_dump($app);die();
 if(!$app->isLogged() && $page != 'login' && $page != 'logout')
 {

    $page = 'login';

 }

ob_start();

if ($page === 'welcome') {

    require ROOT . '/ressouces/views/admin/welcome.php';
   
}else if($page === 'produits'){

	require ROOT . '/ressouces/views/admin/pages/Produits/produits.php';
}elseif ($page === 'provision') {
	
	require ROOT . '/ressouces/views/admin/pages/Produits/provision.php';
}elseif($page === 'livraison'){

	require ROOT . '/ressouces/views/admin/pages/Produits/livraison.php';
}elseif($page === 'edit'){

	require ROOT . '/ressouces/views/admin/pages/Produits/editProduitDelete/editProduit.php';
}elseif($page === 'post'){

	require ROOT . '/ressouces/views/admin/pages/Publication/publication.php';
}elseif($page === 'login'){

     require ROOT . '/ressouces/views/admin/pages/Login/login.php';
   // require ROOT . '/ressouces/views/admin/welcome.php';
}elseif ($page === 'logout') {

    // var_dump("Location: ". ROOT . "/ressouces/views/admin/pages/Login/logout.php");die();
    // header("Location: ". ROOT . "/ressouces/views/admin/pages/Login/logout.php");
		
        
        session_destroy();
        //var_dump($_SESSION);die();

        require ROOT . '/ressouces/views/admin/pages/Login/login.php';
}elseif($page === 'approvision'){

    require ROOT . '/ressouces/views/admin/pages/Produits/approvisionnement/approvisionner.php';
}

$content = ob_get_clean();



if($page === 'login' || $page === 'logout' ){
	 require ROOT . '/ressouces/views/layouts/defaultLgin.php';
}else{
	require ROOT . '/ressouces/views/layouts/master.php';
}







