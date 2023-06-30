<?php
date_default_timezone_set('Asia/Taipei');
$time = date('Y-m-d H:i:s');
header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
if (
    empty($_POST['name']) ||
    empty($_POST['data'])
) {
    $json = [
        'ok' => false,
        'message' => 'Please input all fields'
    ];
    $response = json_encode($json);
    echo $response;
    die();
}
// 若讀取失敗
/*if (
    empty($_POST['name'])
) {
    $json = array(
        "ok" => false,
        "message" => "Please input content"
    );

    $response = json_encode($json);
    echo $response;
    die();
}*/

/*function conn($dbname)
{
    try
    {
        $var = require "config.php";
        $dbname = $var['dbname'];
        $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8",$var['user'],$var['pass']);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage());
    }
    return $pdo;
}
$var = require "config.php";
$dbname = $var['dbname'];

$pdo = conn($dbname);
$sth = $pdo->prepare($sql);
try
{
    if ($sth->execute($var['field']))
    {

    }
    else
    {
        ref([0,'error.php']);
    }
}
catch (PDOException $e)
{
    echo 'error';
}
unset($pdo);
/*$json = array(
    "comments" => $comments
);
$response = json_encode($json);
header('Content-type：application/json;charset=utf-8');*/
/*echo $response;*/