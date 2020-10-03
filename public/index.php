<?php
use app\App;
use Core\Auth\DBAuth;
define('ROOT', dirname(__DIR__)); 
require ROOT. "/app/App.php";
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'acceuil';
}
if($page === 'acceuil'){

    require ROOT . '/ressouces/views/admin/pageAcceuil.php';
}

ob_start();

if ($page === 'welcome') {
    $app = new DBAuth(App::getInstance()->getDB('user'));
//var_dump($app);die();
 if(!$app->isLogged() && $page != 'login' && $page != 'logout')
 {

    $page = 'login';
    
   
    
    require ROOT . '/ressouces/views/admin/pages/Login/login.php';

 }else{
     
     require ROOT . '/ressouces/views/admin/welcome.php';
 }

}else if($page === 'produits'){
          $app = new DBAuth(App::getInstance()->getDB('user'));

         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
            require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
             
             require ROOT . '/ressouces/views/admin/pages/Produits/produits.php';
         }

}elseif ($page === 'provision') {
        $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
            require ROOT . '/ressouces/views/admin/pages/Produits/provision.php'; 
         }
	
}elseif($page === 'livraison'){
     
     $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
     
	         require ROOT . '/ressouces/views/admin/pages/Produits/livraison.php';
         }
}elseif($page === 'edit'){
    
        $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{

	         require ROOT . '/ressouces/views/admin/pages/Produits/approvisionnement/approvisionner.php';
         }
}elseif($page === 'post'){
    
       $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{

        	require ROOT . '/ressouces/views/admin/pages/Publication/publication.php';
         }
}elseif($page === 'login'){

       $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
    
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
         }
   // require ROOT . '/ressouces/views/admin/welcome.php';
}elseif ($page === 'logout') {

    // var_dump("Location: ". ROOT . "/ressouces/views/admin/pages/Login/logout.php");die();
    // header("Location: ". ROOT . "/ressouces/views/admin/pages/Login/logout.php");
		
        
        session_destroy();
        //var_dump($_SESSION);die();
       require ROOT . '/ressouces/views/admin/pageAcceuil.php';
        //require ROOT . '/public_html/ressouces/views/admin/pages/Login/login.php';
}elseif($page === 'approvision'){
    $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
     
            require ROOT . '/ressouces/views/admin/pages/Produits/approvisionnement/approvisionner.php';
         }
}elseif($page === 'user'){
   
     $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
  
            require ROOT . '/ressouces/views/admin/pages/Utilisateur/users.php';
         }
}elseif($page === 'categorie'){
       
       $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
       
            require ROOT . '/ressouces/views/admin/pages/Produits/categorie.php';
         }
}elseif($page === 'alert'){
  
       $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{
             
             require ROOT . '/ressouces/views/admin/pages/Produits/alertProduit.php';
         }
}elseif($page === 'commande'){
     
     $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{

    require ROOT . '/ressouces/views/admin/pages/Produits/commande.php';
         }
}elseif($page === 'acceuil'){

      
             require ROOT . '/ressouces/views/admin/pageAcceuil.php';
} elseif($page === 'paie'){
     
     $app = new DBAuth(App::getInstance()->getDB('user'));
       
         if(!$app->isLogged() && $page != 'login' && $page != 'logout')
         {
        
            $page = 'login';
            
             require ROOT . '/ressouces/views/admin/pages/Login/login.php';
        
         }else{

    require ROOT . '/ressouces/views/admin/pages/Produits/paie.php';
         }
}

$content = ob_get_clean();



if($page === 'login' || $page === 'logout' ){
    
	 require ROOT . '/ressouces/views/layouts/defaultLgin.php';
}elseif($page === 'acceuil'){
    
     //require ROOT . '/public_html/ressouces/views/admin/pageAcceuil.php';
}
else{
	require ROOT . '/ressouces/views/layouts/master.php';
}



