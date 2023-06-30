<?php
function ref($a)
{
    header('refresh:'.$a[0].';url="'.$a[1].'"');
}

function p($a){return $_POST[$a];}
function g($a){return $_GET[$a];}
function s($a){return $_SESSION[$a];}
function set_s($a){$_SESSION[$a[0]]=$a[1];}
function f($a){return $_FILES[$a];}
function v($a){return var_dump($a);}
function k($a){return md5($a);}
function e($a){return explode(':',$a);}
?>