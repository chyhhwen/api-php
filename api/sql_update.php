<?php
date_default_timezone_set('Asia/Taipei');
header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
/*$filename = time().'sql_upd.json';
$fp = fopen($filename, 'w');
fwrite($fp,json_encode([
    $_POST
],JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
fclose($fp);*/

if (
    empty($_POST['id']) ||
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
function conn($dbname)
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
$field = [$_POST['name'],$_POST['data'],$_POST['id']];
$sql ="UPDATE `". $var['db'] ."` SET `name` = ? , `data` = ? WHERE `id` = ?";
echo $sql;
$sth = $pdo->prepare($sql);
try
{
    if (!($sth->execute($field)))
    {
        die();
    }
}
catch (PDOException $e)
{
    die();
}
unset($pdo);
