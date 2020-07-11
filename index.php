<?php

require('autoload.php');
if(file_exists('config.inc.php'))
    require_once 'config.inc.php';


if(CSession::checkPopulateApplication())
{
    CSession::unsetCookie();
    header('Location: /playadice/index');
    //SampleUsers::generateUserPool(3, 3, 3);TODO CREARE UN SEEDER

}
elseif(file_exists('config.inc.php'))
{
    $controller = new FrontController();
    $controller->run();
}

elseif(Installation::makeInstallation()){
    CSession::populateApplication();
    header('Location: /playadice/index'); // redirect verso l'applicazione
}

?>
