<?php

$connection;
function connect() {
    global $connection, $host, $username, $password, $database;

    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }
}

function mysqlQuery($query) {
    global $connection;

    if($connection == NULL) connect();

    $result = $connection->query($query);
    if (!$result) {
        printf("Query failed: %s\n", $connection->error);
        exit();
    }

    return $result;
}

?>