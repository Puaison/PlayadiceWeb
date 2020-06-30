<?php

require('autoload.php');
if(file_exists('config.php'))
    require_once 'config.php';

/*
if(CSession::checkPopulateApplication())
{
    CSession::unsetCookie();
    header('Location: /deepmusic/index');
    SampleUsers::generateUserPool(3, 3, 3);

}
else*/

if(file_exists('config.php'))
{
    $controller = new FrontController();
    $controller->run();
}

/*
elseif(Installation::makeInstallation()){
    CSession::populateApplication();
    header('Location: /deepmusic/index'); // redirect verso l'applicazione
}
*/
?>