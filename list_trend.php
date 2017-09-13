<?php
/**
 * Created by PhpStorm.
 * User: Andrei R S Balbo
 * Date: 9/11/2017
 * Time: 3:46 PM
 */
$herokudburl = 'mysql://be8f4106de0793:a892af13@us-cdbr-iron-east-05.cleardb.net/heroku_12321427b6678fd?reconnect=true';
$url = parse_url(getenv($herokudburl));

$server = 'us-cdbr-iron-east-05.cleardb.net';
$username = 'be8f4106de0793';
$password = 'a892af13';
$dbx = 'heroku_12321427b6678fd';

$db = new mysqli($server, $username, $password, $dbx);



$sql = 'select * from repositories order by stars desc';
$result = mysqli_query($db,$sql);

if(count($result)<1){
    die("Nao ha dados gravados no BD");
}
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
<p class="tabletitle">Trending repos list</p>
<table align="center" style="left:20px; width:1150px; border: 1pt solid black;">
    <tr style="border:1pt solid black;">
        <th class="thlist">ID</th>
        <th class="thlist">User</th>
        <th class="thlist">Name</th>
        <th class="thlist">Description</th>
        <th class="thlist">Details</th>

    </tr>

    <?php
    $rows = mysqli_fetch_all($result);
    //echo '<pre>';
    //echo var_dump($rows);

    for($i=0;$i<count($rows);$i++){
    ?>
    <tr style="border:solid;">
    <td class="tdlist"><?php echo $rows[$i][0];?></td>
    <td class="tdlist"><?php echo $rows[$i][1];?></td>
    <td class="tdlist"><?php echo $rows[$i][2];?></td>
    <td class="tdlist"><?php echo $rows[$i][3];?></td>
        <td class="tdlist" align="center"><a href="\get_details.php?id=<?php echo $rows[$i][0];?>"> <img src="/git_api/img/info.png" width="55px" height="55px"></a></td>
    </tr>
        <?php }?>

</table>
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
    }
    .tabletitle{
        position: relative;
        margin-bottom: 3px;
        left:40px;
        color: white;
        font-family: Calibri;
        font-size: 20px;
        font-weight: bold;

    }
    div.table-title {
        display: block;
        margin: auto;
        max-width: 600px;
        padding:5px;
        width: 100%;
    }

    .table-title h3 {
        color: #fafafa;
        font-size: 30px;
        font-weight: 400;
        font-style:normal;
        font-family: "Roboto", helvetica, arial, sans-serif;
        text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
        text-transform:uppercase;
    }


    /*** Table Styles **/

    .table-fill {
        background: white;
        border-radius:3px;
        border-collapse: collapse;
        height: 320px;
        margin: auto;
        max-width: 600px;
        padding:5px;
        width: 100%;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        animation: float 5s infinite;
    }

    th {
        color:#D5DDE5;;
        background:#1b1e24;
        border-bottom:4px solid #9ea7af;
        border-right: 1px solid #343a45;
        font-size:23px;
        font-weight: 100;
        padding:24px;
        text-align:left;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        vertical-align:middle;
    }

    th:first-child {
        border-top-left-radius:3px;
    }

    th:last-child {
        border-top-right-radius:3px;
        border-right:none;
    }

    tr {
        border-top: 1px solid #C1C3D1;
        border-bottom-: 1px solid #C1C3D1;
        color: #3a3e54;
        font-size:16px;
        font-weight:normal;
        text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
    }

    tr:hover td {
        background: rgba(78, 80, 102, 0.56);
        color:#FFFFFF;
        border-top: 1px solid #22262e;
    }

    tr:first-child {
        border-top:none;
    }

    tr:last-child {
        border-bottom:none;
    }

    tr:nth-child(odd) td {
        background:#EBEBEB;
    }

    tr:nth-child(odd):hover td {
        background: rgba(78, 80, 102, 0.5);
    }

    tr:last-child td:first-child {
        border-bottom-left-radius:3px;
    }

    tr:last-child td:last-child {
        border-bottom-right-radius:3px;
    }

    td {
        background:#FFFFFF;
        padding:20px;
        text-align:left;
        vertical-align:middle;
        font-weight:300;
        font-size:18px;
        text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
        border-right: 1px solid #C1C3D1;
    }

    td:last-child {
        border-right: 0px;
    }

    th.text-left {
        text-align: left;
    }

    th.text-center {
        text-align: center;
    }

    th.text-right {
        text-align: right;
    }

    td.text-left {
        text-align: left;
    }

    td.text-center {
        text-align: center;
    }

    td.text-right {
        text-align: right;
    }



</style>
