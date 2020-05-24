<?php
require('autoload.php');
echo "\n";
print ("Hello");
echo "\n";
/*
$User=new EUtente();

$User->setNome("Alessio");
$User->setCognome("Perozzi");
$User->setEmail("Test@Gmail.com");
$User->setUsername("Pantaleone");
$User->setPassword("1234");

$Avatar=new EAvatar();
$Avatar->setProprietario($User);

$Avatar2=new EAvatar();
$Avatar2= clone $Avatar;
$Avatar2->setNome("Vellista");

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
*/

$User=new EUtente();

$User->setNome("asd");
$User->setCognome("Peadzi");
$User->setEmail("Test@qwdl.com");
$User->setUsername("Pqwdne");
$User->setPassword("1dw34");

var_dump($User);
/**$Pippo = FPersistantManager::getInstance()->update($User);
if ($Pippo)
    echo ("si");
else
    echo ("no");**/
/**$Pippo = FPersistantManager::getInstance()->store($User);

if ($Pippo)
    echo ("si");
else
    echo ("no");**/
$Pippo = FPersistantManager::getInstance()->remove($User);

if ($Pippo)
    echo ("si");
else
    echo ("no");



?>