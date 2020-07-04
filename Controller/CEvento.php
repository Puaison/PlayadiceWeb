<?php

/**
 *
 * Il Controller CSong implementa le funzionalitÃ  'Gestione Brano'.
 * Un musicista puÃ² creare un brano, ed insieme ai moderatori puÃ² modificarlo o rimuoverlo.
 *
 * @author Gruppo DelSignore/Marottoli/Perozzi
 * @package Controller
 */
class CEvento
{
    static function showAll()
    {
        $vEvento = new VEvento(); // crea la view
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $eventi = FPersistantManager ::getInstance() -> search("Evento", "All", ''); // carica tutti gli eventi
        $vEvento -> showAll($user, $eventi); // mostra la pagina degli eventi

    }
    static function show($id){
        $vEvento= new VEvento(); // crea la view
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $evento=FPersistantManager::getInstance()->search("Evento","Id",$id);
        $prenotazioni=$evento[0]->getPrenotazioni();
        $check=false;
        if (!empty($prenotazioni)) {
            foreach ($prenotazioni as $value) {
                $nome = $value -> getUtente() -> getUsername();
                if ($nome == $user -> getUsername()) {
                    $check = true;
                }
            }
        }
        $vEvento->show($user, $evento,null,$check);

    }
    static function create(){
        $vEvento=new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $vEvento->create($user);
    }
    static function modify($id){
        $vEvento=new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $evento=FPersistantManager::getInstance()->search("Evento","Id",$id);
        $vEvento->modify($user, $evento);
    }
    static function booking($id){
        $vEvento=new VEvento();
        $user = CSession ::getUserFromSession(); // ottiene l'utente dalla sessione
        $prenotazione= new EPrenotazione();
        $prenotazione->setUtente($user);
        $prenotazione->setIdEvento($id);
        $fp=FPersistantManager::getInstance()->store($prenotazione);
        $evento=FPersistantManager::getInstance()->search("Evento","Id",$id);
        $evento[0]->newPrenotazione($prenotazione);
        $vEvento->show($user,$evento,$fp,true);
    }
    static function updateevento($id){
        $vEvento=new VEvento();
        $evento=$vEvento->createEvento();
        $fasce=$evento->getFasce();
        $luogo=$evento->getLuogo();
        $eventoOld=FPersistantManager::getInstance()->search("Evento", "Id", $id);
        $luogoOld=$eventoOld[0]->getLuogo();
        $luogo->setId($luogoOld->getId());
        $evento->setId($eventoOld[0]->getId());
        FPersistantManager::getInstance()->update($luogo);
        FPersistantManager::getInstance()->update($evento);
        $fasceOld=$eventoOld[0]->getFasce();
        for($i=0;$i<count($fasce);$i++){
            if(isset($fasceOld[$i])) {
                $fasce[$i] -> setId($fasceOld[$i] -> getId());
                $fasce[$i] -> setIdEvento($fasceOld[$i] -> getIdEvento());
                FPersistantManager::getInstance()->update($fasce[$i]);
            }

            else{
                $fasce[$i]->setIdEvento($eventoOld[0]->getId());
                FPersistantManager::getInstance()->store($fasce[$i]);
            }



        }

        header('Location: /playadice/evento/showAll');
    }

    static function store(){
        $vEvento=new VEvento();
        $evento=$vEvento->createEvento();
        $luogo=$evento->getLuogo();
        FPersistantManager::getInstance()->store($luogo);
        FPersistantManager::getInstance()->store($evento);
        $fasce=$evento->getFasce();

        foreach ($fasce as $value ){
            FPersistantManager::getInstance()->store($value);

        }
        header('Location: /playadice/evento/showAll');

    }
    static function delete($id)
    {
        if(is_numeric($id)){
            $evento= FPersistantManager::getInstance()->search("Evento", "Id", $id);
            $luogo=$evento[0]->getLuogo();
            FPersistantManager::getInstance()->remove($evento[0]);
            FPersistantManager::getInstance()->remove($luogo);
            header('Location: /playadice/evento/showAll');


        }
        else
            header('Location: /playadice/evento/showAll');


    }

}