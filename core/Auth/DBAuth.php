<?php

namespace Core\Auth;

use Core\Database\Database;


class DBAuth
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAuthUserId()
    {
        if($this->isLogged())
        {
            return $_SESSION['auth'];
        }
        return false;
    }

    public function login($email, $password)
    {
        $user = $this->db->prepare("SELECT * FROM t_user WHERE email = ?", [$email], null, true);
        //  var_dump($user);die();

        if($user)
        {
            // if(password_verify($password, $user->password)) si le mot de pass est hacher
            if($password === $user->password) //si non
            {
                $_SESSION['auth'] = $user->id;
                $_SESSION['admin'] = $user->email;
                return true; 
            }
        }
        return false;
    }
    public function forbidden(){
       echo 'interdit';
    }
     

    public function isLogged()
    {
       return isset($_SESSION['auth']); 
    }

}
