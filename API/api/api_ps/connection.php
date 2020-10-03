<?php

require 'config.php';

class Constants

{

static $DB_HOST = DB_HOST;

static $DB_USER = DB_USER;

static $DB_PASS = DB_PASS;

static $DB_NAME = DB_NAME;



public static function connect()

{

    $con = new Mysqli(Constants::$DB_HOST,Constants::$DB_USER,Constants::$DB_PASS,Constants::$DB_NAME) or die(Mysqli_errno());

    if ($con->connect_error) {

        return null;

    } else {
        
        return $con;

    }
      var_dump($con);

    

}



}

?>