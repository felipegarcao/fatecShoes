<?php 


require __DIR__. '\vendor\autoload.php';

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
 
echo getenv('DB_NAME')."\n";
