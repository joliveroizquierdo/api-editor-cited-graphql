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