<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use App\Modelos\Usuario;

$rootQuery = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'listadoUsuarios' => [
            'type' => Type::listOf($userType),            
            'resolve' => function($root, $args) {
                            return Usuario::listarUsuarios();
                         }
        ],
        'detalleUsuario' => [
            'type' => $userType, 
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],        
            'resolve' => function($root, $args) {
                            return Usuario::detalleUsuario($args);
                         }
        ],

    ]
]);