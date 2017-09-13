<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 9/11/2017
 * Time: 3:46 PM
 */


$herokudburl = 'mysql://be8f4106de0793:a892af13@us-cdbr-iron-east-05.cleardb.net/heroku_12321427b6678fd?reconnect=true';
$url = parse_url(getenv($herokudburl));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$db = new mysqli($server, $username, $password, $db);


//apaga os trendings que estavam salvos, pra pegar os novos
$sql = 'delete from repositories where 1';
mysqli_query($db,$sql);

$service_url = 'https://api.github.com/search/repositories?q=created:>2000-01-01&sort=stars&order=desc';
$curl = curl_init($service_url);

$headers = array(
    'Content-Type: application/json',
    'User-Agent: Awesome-Octocat-App',
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}
curl_close($curl);
$decoded = array();
$decoded = json_decode($curl_response,true);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo 'response ok!';
//echo $decoded->attachments;
echo '<br>';

$num_rows = count($decoded["items"]);
echo '<pre>';
for($i=0;$i<$num_rows;$i++){
    $id = $decoded["items"][$i]["id"];
    $user = $decoded["items"][$i]["owner"]["login"];
    $name = $decoded["items"][$i]["name"];
    $desc = $decoded["items"][$i]["description"];
    $stars = $decoded["items"][$i]["stargazers_count"];
    $sql = 'insert into repositories (id,user,name,description,stars) values ('.$id.',\''.$user.'\',\''.$name.'\',\''.$desc.'\','.$stars.')';
    echo $sql;
    echo '<br>';
    mysqli_query($db,$sql);


}
echo ' Dados salvos no BD! ';

echo '<br><br>';
echo '<a href="/git_api/init.php">Voltar</a>';

//echo '<pre>';
//echo var_dump($decoded["items"][0]["description"]);
//echo ($decoded[0]["description"]);

//echo var_dump($decoded[0]["description"]);