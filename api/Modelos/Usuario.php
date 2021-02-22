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

        $stmt = Conexion::conectarMysql()->prepare($consulta);

        $stmt->bindValue(1, $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindValue(2, $datos['contrasenia'], PDO::PARAM_STR);
        $stmt->bindValue(3, $datos['nombre'], PDO::PARAM_STR);

        $correcto = $stmt->execute();

        if($correcto) {

            $respuesta['status'] = true;
            $respuesta['message'] = 'El usuaurio ' .$datos['usuario'] . ' fue creado correctamente!';
            $respuesta['user'] = $datos;

        }else{

            $respuesta['status'] = false;
            $respuesta['message'] = 'Error al crear el usuario ' .$datos['usuario'];
            $respuesta['user'] = null;

        }

        return $respuesta;
          
    }


}