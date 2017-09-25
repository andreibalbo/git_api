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

$conn = new mysqli($server, $username, $password, 'gitapidb');



$sql = "CREATE TABLE repositories (id int,user varchar(50),name varchar(100),description varchar(500),stars int)";

echo $sql;
echo '<br>';
if (mysqli_query($conn, $sql)) {
    echo "Table repositories created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}


?>