<?php 
define('serverName','localhost');
define('serverUserName','admin');
define('serverPassword','admin123');
define('dbName','mydb');

$dsn = "mysql:host=".serverName.";dbname=".dbName;

try {
    $pdo = new PDO($dsn,serverUserName,serverPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // it is used to through error in exception tag
} catch (PDOException $e) {
    echo "connectin failed: ".$e->getMessage();
}
?>