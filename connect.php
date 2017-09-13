<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 8/8/2017
 * Time: 10:37 AM
 */

$herokudburl = 'mysql://be8f4106de0793:a892af13@us-cdbr-iron-east-05.cleardb.net/heroku_12321427b6678fd?reconnect=true';

$url = parse_url(getenv("$herokudburl"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$db = new mysqli($server, $username, $password, $db);
?>