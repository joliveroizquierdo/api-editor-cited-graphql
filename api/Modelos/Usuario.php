<?php

namespace App\Modelos;

use PDO;
use App\Config\Conexion;

class Usuario {


    public static function listarUsuarios() {

        $consulta = "SELECT id, usuario, contrasenia, nombre FROM `usuarios`";

        $stmt = Conexion::conectarMySql()->query($consulta);
          
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;

        
    }

    public static function detalleUsuario($datos) {

        $consulta = "SELECT id, usuario, contrasenia, nombre FROM  `usuarios` WHERE `id` = ?";
            
        $stmt = Conexion::conectarMysql()->prepare($consulta);

        $stmt->bindValue(1, $datos['id'], PDO::PARAM_INT);
    
        $stmt->execute();
                         
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario;

          
    }

    public static function crearUsuario($datos) {


        $consulta = "INSERT INTO `usuarios` VALUES (null, ?, ?, ?)";

        $con  = Conexion::conectarMysql();

        $stmt = $con->prepare($consulta);

        $stmt->bindValue(1, $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindValue(2, $datos['contrasenia'], PDO::PARAM_STR);
        $stmt->bindValue(3, $datos['nombre'], PDO::PARAM_STR);

        $stmt->execute();

        $datos['id'] = $con->lastInsertId();

        return $datos;//$datos tiene la siguiente estructura: $datos["usuario"]
                      //                                      $datos["contrasenia"]
                      //                                      $datos["nombre"]
                      // y se adiciona el campo id que el ultimo id que se inserto
                      // quedando de la siguiente manera      $datos["id"] más los anteriores,
                      // los cuales vienen desde la variable $args y pasan a la variable $datos como parametros desde la Mutation

          
    }


}