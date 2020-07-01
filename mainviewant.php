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


/*require_once ('./Smarty/libs/Smarty.class.php');

$smarty = new Smarty;
$smarty -> caching= true;
$smarty -> cache_lifetime = 120;


$smarty -> setCompileDir('templates_c');
$smarty -> setTemplateDir('templates');


$msg = 'Messaggio accattivante';
$title = 'Hello titolo';

$User=new EUtente();

$User->setNome("Alessio");
$User->setCognome("Perozzi");
$User->setEmail("Test@Gmail.com");
$User->setUsername("Pantaleone");
$User->setPassword("1234");

$User2=new EUtente();

$User2->setNome("Luchino");
$User2->setCognome("Del presidentissimo");
$User2->setEmail("Test@Gmail.com");
$User2->setUsername("Puaison");
$User2->setPassword("ScemoChiLegge");


$Evento=new EEvento();
$Evento->setNome("PRova1");
$evento2=new EEvento();
$Evento->setCategoria("Torneino Bang fallimento");
$evento2->setNome("Prova2");

$data2=date_create_from_format("d/m/Y H:i:s","13/05/2020 20:00:00");
$data=date_create_from_format("d/m/Y H:i:s","12/05/2020 20:00:00");
$luogo= new ELuogo();
$luogo->setCap("67100");
$luogo->setCitta("L'Aquila");
$luogo->setVia("Via Brasile, 4");
$luogo->setNome("GrandeInverno");


$fascia = new EFascia();
$fascia2 = new EFascia();
$fascia3 = new EFascia();
$fascia->setData($data);
$fascia->setFine($data2);
$fascia2->setData($data);
$fascia2 ->setFine($data2);
$fascia3->setData($data);
$fascia3 ->setFine($data2);

$fascia->setDuratafromDate($data2);
$fascia2->setDuratafromDate($data2);
$fascia3->setDuratafromDate($data2);

$fascia->setData($data);
$fascia ->setFine($data2);
$Evento->newFascia($fascia);
$Evento->newFascia($fascia2);
$Evento->newFascia($fascia3);

$luogo->setId(1);
$Evento->setLuogo($luogo);
$prova= "qwdqwd";
$Evento->setTesto($prova);
$Evento->setFlag(true);
$array = array($Evento,$evento2);*/

/*
 *
 * PERSISTANT MANAGER

$Pippo= FPersistantManager::getInstance()->store($luogo);
$Pippo = FPersistantManager::getInstance()->store($Evento);
foreach ($Evento->getFasce() as $value){
    var_dump ($value);
    $Pippo = FPersistantManager::getInstance()->store($value);
    if ($Pippo)
        echo ("si store avatar2");
    else
        echo ("no store avatar2");
    echo "\n";

}*/

$smarty = SmartyConfig::configure();
$user = CSession::getUserFromSession();

$smarty->assign('error', false);
$smarty->registerObject('user', $user);

$smarty->display('Register.tpl');



//$pippo=FPersistantManager::getInstance()->search("Evento","All",'');
//var_dump($pippo);

?>