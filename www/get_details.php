<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 9/11/2017
 * Time: 3:46 PM
 */

/*
$herokudburl = 'mysql://be8f4106de0793:a892af13@us-cdbr-iron-east-05.cleardb.net/heroku_12321427b6678fd?reconnect=true';
$url = parse_url(getenv($herokudburl));

$server = 'us-cdbr-iron-east-05.cleardb.net';
$username = 'be8f4106de0793';
$password = 'a892af13';
$dbx = 'heroku_12321427b6678fd';

$db = new mysqli($server, $username, $password, $dbx);
*/
$server= 'db';
$username= 'root';
$password= 'example';

$db = new mysqli($server, $username, $password, 'gitapidb');


if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{die("erro com o id");}

$sql = 'SELECT user, name FROM repositories WHERE id='.$id;
$result = mysqli_query($db,$sql);

$rows = mysqli_fetch_all($result);

$user = $rows[0][0];
$name = $rows[0][1];


$service_url = 'https://api.github.com/repos/'.$user.'/'.$name;
//die(var_dump($service_url));
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
//echo 'response ok!';
//echo $decoded->attachments;
//echo '<br>';

//$num_rows = count($decoded["items"]);
//echo '<pre>';
//die(var_dump($decoded));

//user
$user = $decoded["owner"]["login"];
$user_id = $decoded["owner"]["id"];
$avatar_url = $decoded["owner"]["avatar_url"];
$user_url = $decoded["owner"]["html_url"];

//repo
$id = $decoded["id"];
$name = $decoded["name"];
$description = $decoded["description"];
$stars = $decoded["stargazers_count"];
$repo_url = $decoded["html_url"];
$created = $decoded["created_at"];
$updated = $decoded["updated_at"];
$pushed = $decoded["pushed_at"];
$watchers = $decoded["watchers_count"];
$language = $decoded["language"];
$homepage = $decoded["homepage"];
$size = $decoded["size"];
$subscribers = $decoded["subscribers_count"];

//echo var_dump($avatar_url);
?>

<head>
    <title>App</title>
</head>
<body>

<div class="headbar">

    <p class="title">GIT_API</p>
    <p class="info">Andrei Balbo</p>
</div>

<div class="bodyback">
    <p class="texto1" style="left:40px;">User info:</p>
    <div class="userinfo">
        <img style="position:relative;left:20px;top:20px;width:80px;height:80px;" src="<?php echo $avatar_url?>">
        <p class="texto1" style="top:5px;left: 110px;">User: <?php echo $user?></p>
        <p class="texto1" style="top:40px;left: 110px;">Id: <?php echo $user_id?></p>


        <a style="position: absolute;top: 120px;left: 50px; font-size: 20px;color:white;" href="<?php echo $user_url?>">View GitHub User profile</a>
    </div>
    <p class="texto1" style="top:240px;left:40px;">Repository info:</p>

    <div class="repoinfo">
        <p class="texto1" style="top:5px;left: 20px;">Name: <?php echo $name?></p>
        <p class="texto1" style="top:40px;left: 20px;">Id: <?php echo $id?></p>
        <p class="texto2" style="top: 15px;left: 680px;">Size: <?php echo $size?> Bytes</p>
        <p class="texto2" style="top: 40px;left: 680px;">Created at: <?php echo $created?></p>
        <p class="texto2" style="top: 65px;left: 680px;">Updated at: <?php echo $updated?></p>
        <p class="texto2" style="top: 90px;left: 680px;">Pushed at: <?php echo $pushed?></p>

        <img src="/img/star-128.png" title="Stars count" style="position: absolute;top: 20px;left:460px; height: 50px;width: 50px;">
        <p class="texto2" style="top: 50px;left: 470px;"><?php echo $stars?></p>

        <img src="/img/bino.png" title="Watchers count" style="position: absolute;top: 20px;left:530px; height: 50px;width: 50px;">
        <p class="texto2" style="top: 50px;left: 540px;"><?php echo $watchers?></p>

        <img src="/img/subs.png" title="Subs count" style="position: absolute;top: 20px;left:600px; height: 50px;width: 50px;">
        <p class="texto2" style="top: 50px;left: 610px;"><?php echo $subscribers?></p>

        <p class="texto2" style="top: 160px;left: 20px;">Description: <?php echo $description?></p>

        <a style="position: absolute;top: 300px;left: 50px; font-size: 20px;color:white;" href="<?php echo $repo_url?>">View Github repository page</a>

        <?php if($homepage!=null){?>
        <a style="position: absolute;top: 270px;left: 50px; font-size: 20px;color:white;" href="<?php echo $homepage?>">View repository homepage</a>
        <?php }?>
    </div>


</div>

</body>

<style>

    .headbar{
        align-items: center;
        position: absolute;
        width: 1200px;
        height: 50px;
        background: black; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(dimgray, black, dimgray); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(dimgray, black, dimgray); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(dimgray, black, dimgray); /* For Firefox 3.6 to 15 */
        background: linear-gradient(dimgray, black, dimgray); /* Standard syntax */


    }
    .title{
        position: absolute;
        left: 10px;
        margin:5px;
        color: white;
        font-weight: bold;
        font-family: Calibri;
        font-size: 25px;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;


    }
    .info{
        position: absolute;
        left: 1070px;
        margin:10px;
        color: white;
        font-weight: bold;
        font-family: Calibri;
        font-size: 20px;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;
    }
    .bodyback{
        top: 50px;
        position: absolute;
        background-position-x: -150px;
        background-position-y: -90px;

        background-image: url('/img/cc-wallpaper-desktop.png');
        background-size: 1400px 800px;
        width: 1200px;
        height: 700px;
    }
    .userinfo{
        width:400px;
        height: 180px;
        background-color: rgba(255, 255, 255, 0.2);;

        position: absolute;
        top:60px;
        left:20px;
        
    }
    .repoinfo{
        width:1000px;
        height: 350px;
        background-color: rgba(255, 255, 255, 0.2);;

        position: absolute;
        top:300px;
        left:20px;

    }
    .texto1{
        position: absolute;
        color: white;
        font-weight: bold;
        font-family: Calibri;
        font-size:25px;
    }
    .texto2{
        position: absolute;
        color: white;
        font-weight: bold;
        font-family: Calibri;
        font-size:20px;
    }