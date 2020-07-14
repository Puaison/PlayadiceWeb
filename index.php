<?php

/**
 * Questo è lo script che viene attivato per primo ogni volta che si accede all'applicazione.
 * Controlla che l'applicazione sia installata; in caso affermativo lascia la responsabilità
 * al FrontController di fare dispatch e controllare la validità della richiesta.
 * Altrimenti fa partire l'installazione
 */
require('autoload.php');
if(file_exists('config.inc.php'))
    require_once 'config.inc.php';



if(file_exists('config.inc.php'))//se questo file esiste, allora l'applicazione è stata correttamente installata
{
    $controller = new FrontController();
    $controller->run();
}
else {
    $installer=new Installation();
    $installed=$installer->makeInstallation();
    if($installed)
        header('Location: /playadice/index');
}



?>
