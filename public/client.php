<?php
use app\App;
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__)); 
require ROOT. "/app/App.php";
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'welcome';
}

$app = new DBAuth(App::getInstance()->getDB('user'));
//var_dump($app);die();
 if(!$app->isLogged() && $page != 'login' && $page != 'logout')
 {

    $page = 'welcome';

 }

ob_start();

if ($page === 'welcome') {

    require ROOT . '/ressouces/views/pages/welcome/welcome.php';

}elseif ($page === 'logout') {

        session_destroy();
        

        require ROOT . '/ressouces/views/admin/pages/Login/login.php';
}elseif($page === 'approvision'){

    require ROOT . '/ressouces/views/admin/pages/Produits/approvisionnement/approvisionner.php';
}

$content = ob_get_clean();

require ROOT . '/ressouces/views/layouts/default.php';





