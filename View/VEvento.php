<?php
class VEvento extends VObject
{
    function __construct()
    {
        parent::__construct();

        $this->check = array(
            'name' => true,
            'mail' => true,
            'pwd' => true,
            'type' => true
        );
    }
    function showAll(EUtente &$user, $eventi)
    {

        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $eventi);
        $this->smarty->display('PLDCalendario.tpl');

    }
    function show(EUtente &$user, $evento){
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $evento);
        $this->smarty->display('PLDEvento.tpl');

    }
    function create(EUtente &$user){
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('PLDNewEvento.tpl');

    }
    function new(EUtente &$user){
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('PLDNewEvento.tpl');


    }
    function modify(EUtente &$user, $evento){
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $evento);
        $this->smarty->display('PLDEventoModifica.tpl');

    }
    function createEvento() : EEvento
    {

        $evento= new EEvento();


        if(isset($_POST['nome']))
            $evento->setNome($_POST['nome']);
        if(isset($_POST['categoria']))
            $evento->setCategoria($_POST['categoria']);
        if(isset($_POST['prenotazione']))
            $evento->setFlag($_POST['prenotazione']);
        else
            $evento->setFlag(0);

        $luogo=new ELuogo();

        if(isset($_POST['nomeluogo']))
            $luogo->setNome($_POST['nomeluogo']);
        if(isset($_POST['via']))
            $luogo->setVia($_POST['via']);
        $evento->setLuogo($luogo);
        if(isset($_POST['citta']))
            $luogo->setCitta($_POST['citta']);
        if(isset($_POST['cap']))
            $luogo->setCap($_POST['cap']);

        $evento->setLuogo($luogo);

        for($foo=1; $foo<=10; $foo++){
            $finale=$foo+11;

            if(!empty($_POST["$foo"]) and !empty($_POST["$finale"]))
            {

                $fascia=new EFascia();
                $inizio=(date_create_from_format("d/m/Y H:i:s",$_POST["$foo"]));
                $fine=(date_create_from_format("d/m/Y H:i:s",$_POST["$finale"]));
                $fascia->setData($inizio);
                $fascia->setDuratafromDate($fine);
                $fascia->setFine($fine);
                $evento->newFascia($fascia);
            }
        }
        if(isset($_POST['prenotazione']))
            $evento->setFlag($_POST['prenotazione']);
        if(isset($_POST['testo']))
            $evento->setTesto($_POST['testo']);


        return $evento;
    }


}