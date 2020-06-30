<?php
function my_autoload($classe)
{

    require_once 'SmartyConfig.php';

    $entity = __DIR__ . "autoloEntity/" . $classe . ".php";
    $foundation = __DIR__ . "autoloFoundation " . $classe . ".php";
    $controller = __DIR__ . "autoloController " . $classe . ".php";
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
