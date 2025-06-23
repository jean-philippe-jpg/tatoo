<?php

function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'jeAn-phI';
    $DATABASE_PASS = 'J25061984c%#';
    $DATABASE_NAME = 'arcadia';

    $mysql = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);

    try {
    	return $mysql
        ;
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}


//echo "Database connection established successfully!<br>";