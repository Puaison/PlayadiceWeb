<?php
require('autoload.php');

/*
if(CSession::checkPopulateApplication())
{
    CSession::unsetCookie();
    header('Location: /deepmusic/index');
    SampleUsers::generateUserPool(3, 3, 3);

}
else*/

if(file_exists('config.inc.php'))
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