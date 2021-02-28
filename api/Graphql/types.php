<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$userType = new ObjectType([
    'name' => 'Usuario',
    'description' => 'Este es el tipo de dato Usuario',
    'fields' => [
        'id' => Type::int(),
        'usuario' => Type::string(),
        'contrasenia' => Type::string(),
        'nombre' => Type::string()       
    ]
]);

$userTypeResponse = new ObjectType([
    'name' => 'UsuarioInsertadoOActualizadoRespuesta',
    'description' => 'Este es el tipo de dato UsuarioInsertadoOActualizadoRespuesta, se envia como respuesta al crear/actualizar un usuario',
    'fields' => [
        'status' => Type::boolean(),
        'message' => Type::string(),
        'user' => $userType    
    ]
]);