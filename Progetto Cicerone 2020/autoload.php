<?php
function my_autoload($classe)
    {$entity=__DIR__."/"."Entity/".$classe.".php";
    if(file_exists($entity))
        echo ($entity);
    echo"\n";
        include $entity;
       }


spl_autoload_register("my_autoload");
