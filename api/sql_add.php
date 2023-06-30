<?php
date_default_timezone_set('Asia/Taipei');
$time = date('Y-m-d H:i:s');
$dbname = "bookstore";
$sql = "";
$data = "";
function conn($dbname)
{
    try
    {
        $var = require "require.php";
        $pdo = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8",$var['user'],$var['pass']);
    }
    catch (PDOException $e)
    {
        throw new PDOException($e->getMessage());
    }
    return $pdo;
}
$pdo = conn($dbname);
$sth = $pdo->prepare($sql);
try
{
    if ($sth->execute($data))
    {
        #ref([0,'error.php']);
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
