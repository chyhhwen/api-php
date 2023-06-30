<?php
date_default_timezone_set('Asia/Taipei');
$time = date('Y-m-d H:i:s');
$dbname = "bookstore";
$sql = "SELECT * FROM";
$field = "";
function conn($dbname)
{
    try
    {
        $var = require "config.php";
        $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8",$var['user'],$var['pass']);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage());
    }
    return $pdo;
}
$pdo = conn($dbname);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$array = array(array());
try
{
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $i = 0;
        for($j=0;$j < count($field);$j++)
        {
            $array[$i][$j] = $row[$field[$i]];
            $i += 1;
        }
    }
}
catch (PDOException $e)
{
    echo 'error';
}
unset($pdo);
