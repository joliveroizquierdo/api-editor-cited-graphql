<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use App\Modelos\Usuario;

$rootQuery = new ObjectType([
    
    'name' => 'Query',
    'fields' => [

        'listadoUsuarios' => [
            'description' => 'Lista los usuarios',
            'type' => Type::listOf($userType),            
            'resolve' => function($root, $args) {
                            return Usuario::listarUsuarios();
                         }
        ],

        'detalleUsuario' => [
            'description' => 'Detallado de un usuario',
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],   
            'type' => $userType,     
            'resolve' => function($root, $args) {
                            return Usuario::detalleUsuario($args);
                         }
        ],

    ]

]);