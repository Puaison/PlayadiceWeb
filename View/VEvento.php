<?php
class VEvento extends VObject
{
    function __construct()
    {
        parent::__construct();

        $this->check = array(
            'Nome' => true,
            'Descrizione' => true,
            'NomeLuogo' => true,
            'Via' => true,
            'Cap' => true,
            'Citta' => true,

        );
    }
    function showAll(EUtente &$user, $eventi, $check=null)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $eventi);
        $this->smarty->assign('check', $check);
        $this->smarty->display('PLDCalendario.tpl');

    }
    function show(EUtente &$user, $evento, $check = null , $error = null , $book = null){
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $evento);
        $this->smarty->assign('check', $check);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('book', $book);
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->display('PLDEvento.tpl');

    }
    function create(EUtente &$user){
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('check', $this->check);
        $this->smarty->assign('prec', $_POST);
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('PLDNewEvento.tpl');

    }

    function modify(EUtente &$user, $evento){
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('check', $this->check);
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
    /**
     * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri
     * del nuovo evento
     * @param EEvento $evento l'oggetto evento da controllare
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateNuovoEvento(EEvento $evento): bool
    {
        $this->check['Nome']=$evento->validateNome();
        $this->check['Descrizione']=$evento->validateTesto();
        $luogo=$evento->getLuogo();
        if($luogo){
            $this->check['NomeLuogo']=$luogo->validateNome();
            $this->check['Cap']=$luogo->validateCap();
            $this->check['Via']=$luogo->validateVia();
            $this->check['Citta']=$luogo->validateCitta();
        }

        if($this->check['Nome'] && $this->check['Descrizione']
            && $this->check['NomeLuogo'] && $this->check['Cap']
            && $this->check['Via'] && $this->check['Citta'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}