<?php

use GraphQL\Type\Definition\Type;

use App\Modelos\Usuario;

$userMutations = [
    'insertarUsuario' => [
        'args' => [
            'usuario' => Type::nonNull(Type::string()),
            'contrasenia' => Type::nonNull(Type::string()),
            'nombre' => Type::nonNull(Type::string())
        ],
        'type' => $userTypeResponse,
        'resolve' => function($root, $args) {
                        return Usuario::crearUsuario($args);
                     }
    ],
    'actualizarUsuario' => [
        'args' => [
            'id' => Type::nonNull(Type::int()),
            'usuario' => Type::nonNull(Type::string()),
            'contrasenia' => Type::nonNull(Type::string()),
            'nombre' => Type::nonNull(Type::string())
        ],
        'type' => $userTypeResponse,
        'resolve' => function($root, $args) {
                        return Usuario::actualizarUsuario($args);
                     }
    ],
    'eliminarUsuario' => [
        'args' => [
            'id' => Type::nonNull(Type::int())
        ],
        'type' => $userTypeResponse,
        'resolve' => function($root, $args) {
                        return Usuario::eliminarUsuario($args);
                     }
    ]

];