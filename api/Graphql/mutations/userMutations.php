<?php

use GraphQL\Type\Definition\Type;

use App\Modelos\Usuario;

$userMutations = [
    'insertarUsuario' => [
        'type' => $userTypeResponse,
        'args' => [
            'usuario' => Type::nonNull(Type::string()),
            'contrasenia' => Type::nonNull(Type::string()),
            'nombre' => Type::nonNull(Type::string())
        ],
        'resolve' => function($root, $args) {
                        return Usuario::crearUsuario($args);
                     }
    ],
    'actualizarUsuario' => [
        'type' => $userTypeResponse,
        'args' => [
            'id' => Type::nonNull(Type::int()),
            'usuario' => Type::nonNull(Type::string()),
            'contrasenia' => Type::nonNull(Type::string()),
            'nombre' => Type::nonNull(Type::string())
        ],
        'resolve' => function($root, $args) {
                        return Usuario::actualizarUsuario($args);
                     }
    ]

];