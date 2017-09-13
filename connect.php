<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 8/8/2017
 * Time: 10:37 AM
 */
$user = 'root';
$pwd = '';
$ndb = 'gitapi';
$db = new mysqli('localhost',$user,$pwd,$ndb) or die("falha ao conectar ao db");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
else{echo 'Conectado na base de dados!';}