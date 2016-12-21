<?php

class Autoloader {
public static function loader($class)
{
$filename = "$class" . '.php';
if(!file_exists($filename))
{
return false;
}
include $filename;
}
}
?>
