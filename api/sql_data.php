<?php
date_default_timezone_set('Asia/Taipei');
$time = date('Y-m-d H:i:s');
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
$field = $var['field'];
$pdo = conn($dbname);
$sql = "SELECT * FROM `picture`";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$comments = array();
try
{
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        array_push($comments, array(
            "id" => $row[$field[0]],
            "name" => $row[$field[1]],
            "data" => $row[$field[2]]
        ));
    }
}
catch (PDOException $e)
{
    echo 'error';
}
unset($pdo);
$json = array(
    "comments" => $comments
);
$response = json_encode($json);
header('Content-type：application/json;charset=utf-8');
echo $response;