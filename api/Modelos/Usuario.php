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
            $respuesta['message'] = 'El usuaurio ' .$datos['usuario'] . ' creado correctamente!';
            $respuesta['user'] = $datos;

        }else{

            $respuesta['status'] = false;
            $respuesta['message'] = 'Error al crear el usuario ' .$datos['usuario'];
            $respuesta['user'] = null;

        }

        return $respuesta;
          
    }

    public static function actualizarUsuario($datos) {


        $consulta = "UPDATE `usuarios` 
                        SET `usuario` = ?,
                            `contrasenia` = ?,
                            `nombre` = ?
                      WHERE `id` = ?";

        $stmt = Conexion::conectarMysql()->prepare($consulta);

        $stmt->bindValue(1, $datos['usuario'], PDO::PARAM_STR);
        $stmt->bindValue(2, $datos['contrasenia'], PDO::PARAM_STR);
        $stmt->bindValue(3, $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(4, $datos['id'], PDO::PARAM_INT);

        $correcto = $stmt->execute();

        if($correcto) {

            $respuesta['status'] = true;
            $respuesta['message'] = 'El usuario ' .$datos['usuario'] . ' actualizado correctamente!';
            $respuesta['user'] = $datos;

        }else{

            $respuesta['status'] = false;
            $respuesta['message'] = 'Error al actualizar los datos del usuario ' .$datos['usuario'];
            $respuesta['user'] = null;

        }

        return $respuesta;
          
    }

    public static function eliminarUsuario($datos) {

        $consulta = "DELETE FROM `usuarios` WHERE `id` = ?";

        $stmt = Conexion::conectarMysql()->prepare($consulta);

        $stmt->bindValue(1, $datos['id'], PDO::PARAM_INT);

        $correcto = $stmt->execute();//si le paso un id que ya existe manda el mensaje de exito, mejroar la validación y asegurarme de que se elimino

        if($correcto) {

            $respuesta['status'] = true;
            $respuesta['message'] = 'El usuario con el id ' .$datos['id'] . ' fue eliminado correctamente!';
            $respuesta['user'] = $datos;

        }else{

            $respuesta['status'] = false;
            $respuesta['message'] = 'Error al eliminar el usuario con ' .$datos['id'];
            $respuesta['user'] = null;

        }

        return $respuesta;

          
    }

}