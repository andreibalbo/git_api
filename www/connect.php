<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 8/8/2017
 * Time: 10:37 AM
 */

$herokudburl = 'mysql://be8f4106de0793:a892af13@us-cdbr-iron-east-05.cleardb.net/heroku_12321427b6678fd?reconnect=true';
$url = parse_url(getenv($herokudburl));
/*
$server = 'us-cdbr-iron-east-05.cleardb.net';
$username = 'be8f4106de0793';
$password = 'a892af13';
$dbx = 'heroku_12321427b6678fd';
*/
$server= 'db';
$username= 'root';
$password= 'example';


// Create connection
$conn = new mysqli($server, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
try{
$sql = "CREATE DATABASE gitapidb";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
    die;
}
}
catch(Exception $e){}

?>