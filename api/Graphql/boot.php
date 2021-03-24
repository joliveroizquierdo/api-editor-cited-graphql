<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header('Content-Type: application/json; charset=UTF-8');

use GraphQL\GraphQL;
use GraphQL\Type\Schema;

require_once 'types.php';
require_once 'query.php';
require_once 'mutations.php';

$schema = new Schema([
    'query' => $rootQuery,
    'mutation' => $rootMutation
]);

try {

    $rawInput = file_get_contents('php://input');
    $input = json_decode($rawInput, true);
    $query = $input['query'];
    $variableValues = isset($input['variables']) ? $input['variables'] : null;

    $result = GraphQL::executeQuery($schema, $query, null, null, $variableValues);

    $output = $result->toArray();
    
} catch(\Exception $e) {
    $output = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

echo json_encode($output);
