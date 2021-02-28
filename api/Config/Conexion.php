<?php

namespace App\Config;

use PDO;

class Conexion {

    protected $dbh;

    public static function conectarMySql() {

      try{

        $motor		  = 'mysql';
        $servidor 	= getenv('DB_HOST');
        $bd		    	= getenv('DB_NAME');
        $user   		= getenv('DB_USER');
        $password	  = getenv('DB_PASS');

        $dbh = new PDO(
          $motor . ':host=' . $servidor . ';dbname=' . $bd, $user, $password,
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4")
        );

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;

      }catch(PDOException $e) {

        echo 'Error en la conexión: ' . $e->getMessage();

      }
      
    }

  }