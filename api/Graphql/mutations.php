<?php

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

use App\Modelos\Usuario;

// require('mutations/userMutations.php');
// //require('mutations/addressMutations.php');

// $mutations = array();
// $mutations += $userMutations;
// //$mutations += $addressMutations;

// $rootMutation = new ObjectType([
//     'name' => 'Mutation',
//     'fields' => $mutations
// ]);

$rootMutation = new ObjectType([

    'name' => 'Mutation',
    'fields' => [

	    'insertarUsuario' => [
	    	'description' => 'Crear usuarios',
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
	    	'description' => 'Actualizar usuarios por le id',
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
	    	'description' => 'Eliminar usuarios por le id',
	        'args' => [
	            'id' => Type::nonNull(Type::int())
	        ],
	        'type' => $userTypeResponse,
	        'resolve' => function($root, $args) {
	                        return Usuario::eliminarUsuario($args);
	                     }
	    ]

	]

]);