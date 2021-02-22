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

$userTypeInsertResult = new ObjectType([
    'name' => 'UsuarioInsertadoRespuesta',
    'description' => 'Este es el tipo de dato UsuarioInsertadoRespuesta, se envia como respuesta al crear un usuario',
    'fields' => [
        'status' => Type::boolean(),
        'message' => Type::string(),
        'user' => $userType    
    ]
]);