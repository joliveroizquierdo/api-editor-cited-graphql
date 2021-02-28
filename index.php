<?php

require_once 'vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::create(__DIR__);
    $dotenv->load();

require_once 'api/Graphql/boot.php';



