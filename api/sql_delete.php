<?php
date_default_timezone_set('Asia/Taipei');
header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
/*$filename = time().'sql_del.json';
$fp = fopen($filename, 'w');
fwrite($fp,json_encode([
    $_POST
],JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
fclose($fp);*/

if (
    empty($_POST['id'])
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
$sql = "DELETE FROM `" . $var['db'] ."` WHERE `id` = \"". $_POST['id'] ."\"";
echo $sql;
$sth = $pdo->prepare($sql);
try
{
    if (!($sth->execute()))
    {
        die();
    }
}
catch (PDOException $e)
{
    die();
}
unset($pdo);
