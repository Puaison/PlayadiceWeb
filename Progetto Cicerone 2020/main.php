<?php
require('autoload.php');
echo "\n";
print ("Hello");
echo "\n";



$User=new EUtente();

$User->setNome("Alessio");
$User->setCognome("Perozzi");
$User->setEmail("Test@Gmail.com");
$User->setUsername("Pantaleone");
$User->setPassword("1234");

$Avatar=new EAvatar();
$Avatar->setProprietario($User);
$Avatar->setNome("Pippo");

$Pippo = FPersistantManager::getInstance()->store($User);
if ($Pippo)
    echo ("si store");
else
    echo ("no store");
echo "\n";

$Pippo = FPersistantManager::getInstance()->search("Utente","UserName","Pantaleone");
var_dump($Pippo);
echo ("----------------------------------------------------------");

$Pippo = FPersistantManager::getInstance()->store($Avatar);
if ($Pippo)
    echo ("si storeA");
else
    echo ("no storeA");
echo "\n";

$Pippo = FPersistantManager::getInstance()->search("Avatar","Nome","Pippo");
$av=$Pippo[0];

$av->setNome("Cipollino");

$Pippo = FPersistantManager::getInstance()->update($av);
if ($Pippo)
    echo ("si update");
else
    echo ("no update");
echo "\n";

$Pippo = FPersistantManager::getInstance()->exists("Avatar","Nome","Cipollino");

echo ($Pippo);

/*
$Pippo = FPersistantManager::getInstance()->remove($av);
if ($Pippo)
    echo ("si remove");
else
    echo ("no remove");
echo "\n";


$Pippo=new EProposta();
$Pippo->setTipoProposta("Modifica");
$Pippo->setModificato($Avatar);
$Pippo->setProposto($Avatar2);


echo "\n\n\n";
echo "\n\n\n";

var_dump($Pippo);


$Pippo->approvaProposta();
echo "\n\n\n";
echo "\n\n\n";

var_dump($Pippo);


    try
    {
        $pdo = new PDO ("mysql:host=127.0.0.1;dbname=testphp", "root");
    }
    catch ( PDOException $e)
    {
        print $e->getMessage() . "\n";
        print ("Non ha funzionato rip");
        exit;
    }

    $stmt = $pdo->query("SELECT * FROM user");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    var_dump($rows);




$Colonna= "Nome";
$Valore= "Alessio";
$Pippo = FPersistantManager::getInstance()->search("Utente","Nome","Alessio");


echo ($Pippo[0]->getUsername());


$User=new EAdmin();

$User->setNome("Alessandrone");
$User->setCognome("oaudygvowya");
$User->setEmail("fqiubhiqpu");
$User->setUsername("AdminoK");
$User->setPassword("dafowuhnfa");


$Pippo = FPersistantManager::getInstance()->store($User);
if ($Pippo)
    echo ("si store");
else
    echo ("no store");
echo "\n";


$Pippo = FPersistantManager::getInstance()->exists("Utente","Nome","Alessio");

echo ($Pippo);



$Pippo = FPersistantManager::getInstance()->store($User);
if ($Pippo)
    echo ("si store");
else
    echo ("no store");
echo "\n";/*


/*
$User->setEmail("Email2");
$Pippo = FPersistantManager::getInstance()->update($User);
if ($Pippo)
    echo ("si update");
else
    echo ("no update");
echo "\n";


$Pippo = FPersistantManager::getInstance()->remove($User);
if ($Pippo)
    echo ("si remove");
else
    echo ("no remove");
echo "\n";
*/

?>