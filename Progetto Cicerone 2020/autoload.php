<?php
function my_autoload($classe)
{

    require_once 'SmartyConfig.php';

    $entity = __DIR__ . "/" . "Entity/" . $classe . ".php";
    $foundation = __DIR__ . "/" . "Foundation/" . $classe . ".php";
    $controller = __DIR__ . "/" . "Controller/" . $classe . ".php";
    if (file_exists($entity)) {
        include $entity;
    }
    elseif (file_exists($foundation)) {
        include $foundation;
    }
    elseif (file_exists($controller)) {
        include $controller;
    }
    else {
        return false;
    }
    return true;
}

spl_autoload_register("my_autoload");
