<?php
require('EObject.php');
require('EFascia.php');
require('FFascia.php');
require('FPersistantManager.php');
require('EEvento.php');
require('ELuogo.php');
require('FLuogo.php');
require('FUtente.php');
require('FEvento.php');
echo "\n";
print ("Hello");
echo "\n";


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
/*echo ("------------------\n");


$Avatar = FPersistantManager::getInstance()->search("Avatar", "Nome", "Pippo" )[0];

$Proposta = FPersistantManager::getInstance()->search("Proposta", "IDModificato", $Avatar->getId() )[0];
echo ($Proposta->tostring());*/
/*
$fascia = new EFascia();
$data = "2012-05-31 15:00:00";
$data2 = "2012-05-31 16:00:00";
$data = date_create($data);
$data2 = date_create($data2);
$fascia->setData($data);
$fascia->setDurata($data2);
echo "\n";
$evento=new EEvento();
$luogo=new ELuogo();
$luogo->setCap(67100);
$luogo->setCitta("L'Aquila");
$luogo->setVia("Via Brasile, 4");
$evento->setCategoria("Torneo");
$evento->setFlag(true);
$evento->setLuogo($luogo);
$evento->newFascia($fascia);
*/
/**
$luogo=new ELuogo();
$luogo->setCap(67100);
$luogo->setCitta("Teramo");
$luogo->setVia("Via Brasile, 4");
$luogo->setNome("Crossover");


$fascia = new EFascia();
$data = "2020-07-12 21:00:00";
$data2 = "2020-07-13 03:00:00";
$data = date_create($data);
$data2 = date_create($data2);
$fascia->setData($data);
$fascia->setDuratafromDate($data2);

$fascia2 = new EFascia();
$data = "2020-10-17 21:00:00";
$data2 = "2020-10-18 03:00:00";
$data = date_create($data);
$data2 = date_create($data2);
$fascia2->setData($data);
$fascia2->setDuratafromDate($data2);


$evento = new EEvento();
$evento->setLuogo($luogo);
$evento->setCategoria("Torneo");
$evento->setFlag(0);
$evento->setNome("Torneo Heartstone");
$evento->newFascia($fascia);
$evento->newFascia($fascia2);

echo"\n";


$Pippo = FPersistantManager::getInstance()->store($luogo);
if ($Pippo)
    echo ("si store luogo");
else
    echo ("no store luogo");
echo "\n";

$Pippo = FPersistantManager::getInstance()->store($evento);
if ($Pippo)
    echo ("si store evento");
else
    echo ("no store evento");
echo "\n";


foreach ($evento->getFasce() as $value){
    $Pippo = FPersistantManager::getInstance()->store($value);
    if ($Pippo)
        echo ("si store fascia");
    else
        echo ("no store fascia");
    echo "\n";


}
**/



$Pippo = FPersistantManager::getInstance()->remove("luogo","Citta","Teramo")[0];



?>