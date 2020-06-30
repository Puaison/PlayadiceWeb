<?php



require('autoload.php');



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
$msg = 'Messaggio accattivante';
$title = 'Hello titolo';

$User=new EAdmin();

$User->setNome("Alessio");
$User->setCognome("Perozzi");
$User->setEmail("Test@Gmail.com");
$User->setUsername("Pantaleone");
$User->setPassword("1234");

/*
CSession::startSession($User);
*/

$test=CSession::getUserFromSession();
var_dump($test);


echo ($_SESSION['Name'] );
echo ($_SESSION['Username'] );
echo ($_SESSION['type'] );
echo ("Fine")

/*
$User2=new EUtente();

$User2->setNome("Luchino");
$User2->setCognome("Del presidentissimo");
$User2->setEmail("Test@Gmail.com");
$User2->setUsername("Puaison");
$User2->setPassword("ScemoChiLegge");

require_once ('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;
$smarty -> caching= true;
$smarty -> cache_lifetime = 120;


$smarty -> setCompileDir('templates_c');
$smarty -> setTemplateDir('templates');

$array = array($User,$User2);

$smarty ->assign('results',$array);
$smarty ->assign('title',$title);
$smarty ->assign('message',$msg);

$smarty->display('home.tpl');
$smarty->display('TVGMainPage.tpl');
$smarty->display('TVGAvatarDetails.tpl');
$smarty->display('TVGAvatarModify.tpl');
$smarty->display('TVGAvatarApprovazione.tpl');
*/


?>