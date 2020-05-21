<?php
function my_autoload($classe)
{
    $entity = __DIR__ . "/" . "Entity/" . $classe . ".php";
    $foundation = __DIR__ . "/" . "Foundation/" . $classe . ".php";
    if (file_exists($entity)) {
        echo($entity);
        echo "\n";
        include $entity;
    }
    elseif (file_exists($foundation)) {
        echo($foundation);
        echo "\n";
        include $foundation;
    }
    else {
        return false;
    }
    return true;
}




spl_autoload_register("my_autoload");
