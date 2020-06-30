<?php

require('autoload.php');
if(file_exists('config.php'))
    require_once 'config.php';

////////////////////////////SEEDER///////////////////////////////
/*
$User=new EUtente();

$User->setNome("Alessio");
$User->setCognome("Perozzi");
$User->setEmail("Test@Gmail.com");
$User->setUsername("Pantaleone");
$User->setPassword("1234");

$Pippo = FPersistantManager::getInstance()->store($User);
if ($Pippo)
    echo ("si store user");
else
    echo ("no store user");
echo "\n";

$Avatar=new EAvatar();
$Avatar->setProprietario($User);
$Avatar->setNome("Pippo");

$Pippo = FPersistantManager::getInstance()->store($Avatar);
if ($Pippo)
    echo ("si store avatar");
else
    echo ("no store avatar");
echo "\n";

$Avatar2=new EAvatar();
$Avatar2->setProprietario($User);
$Avatar2->setNome("Cipollino");

$Proposta = new EProposta();
$Proposta->setTipoProposta("Modifica");
$Proposta->setModificato($Avatar);
$Proposta->setProposto($Avatar2);

$Pippo = FPersistantManager::getInstance()->store($Avatar2);
if ($Pippo)
    echo ("si store avatar2");
else
    echo ("no store avatar2");
echo "\n";

$Pippo = FPersistantManager::getInstance()->store($Proposta);
if ($Pippo)
    echo ("si store proposta");
else
    echo ("no store proposta");
echo "\n";
*/
/// ///////////////////////////SEEDER////////////////////////////////
/*

$User=new EAdmin();

$User->setNome("Alessio2");
$User->setCognome("Perozzi2");
$User->setEmail("Test@Gmail.com2");
$User->setUsername("Pantaleone3");
$User->setPassword("12342");



CSession::startSession($User);


$test=CSession::getUserFromSession();
var_dump($test);
*/

/*
$User2=new EUtente();

$User2->setNome("Luchino");
$User2->setCognome("Del presidentissimo");
$User2->setEmail("Test@Gmail.com");
$User2->setUsername("Puaison");
$User2->setPassword("ScemoChiLegge");

require_once ('./Smarty/libs/Smarty.class.php');


$smarty = SmartyConfig::configure();
$user = CSession::getUserFromSession();

$smarty->assign('error', false);
$smarty->registerObject('user', $user);

$smarty->display('Login.tpl');


$Pippo = FPersistantManager::getInstance()->search("utente", "UserName", "Pantaleone"); // si verifica che l'utente inserito matchi una entry nel db
var_dump($Pippo[0]);
*/

?>