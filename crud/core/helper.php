<?php

function safe($str)
{
    return strip_tags(trim($str));
}

function readJSON($path)
{
    $string = file_get_contents($path);
    $obj = json_decode($string);
    return $obj;
}

function createFile($string, $path)
{   
    //echo $path; die();
    $create = fopen($path, "w");
    fwrite($create, $string);
    fclose($create);
   // chmod($path, 777);
    return $path;
}

function label($str)
{
    $label = str_replace('_', ' ', $str);
    $label = ucwords($label);
    return $label;
}

?>