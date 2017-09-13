<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 8/7/2017
 * Time: 9:23 AM
 */

?>
<!DOCTYPE html>
<head>

    <title>App</title>

</head>

<body>
<div class="headbar">

    <p class="title">GIT_API</p>
    <p class="info">Andrei Balbo</p>
</div>

<div class="bodyback">

    <a class="get" href="\get_trend.php">
        <img border="0" title="Load/Reload trendings on DB" alt="Get trends" src="/img/button_get-trendings.png">
    </a>

    <a class="list" href="\list_trend.php">
        <img border="0" title="List of loaded repos" alt="List trends" src="/img/button_list-trendings.png">
    </a>

</div>
</body>

<style>
    .headbar{
        align-items: center;
        position: absolute;
        width: 600px;
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
        left: 470px;
        margin:10px;
        color: white;
        font-weight: bold;
        font-family: Calibri;
        font-size: 20px;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: black;
    }

    .get{
        position: absolute;
        top: 50px;
        left: 350px;
    }
    .list{
        position: absolute;
        top:170px;
        left: 350px;
    }

    .bodyback{
        top: 50px;
        position: absolute;
        background-position-x: -150px;
        background-position-y: -90px;

        background-image: url('/img/cc-wallpaper-desktop.png');
        background-size: 600px 500px;
        height: 300px;
        width: 600px;
    }


</style>