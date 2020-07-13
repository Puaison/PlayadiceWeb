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
            'Fasce' => true,

        );
    }

    /**
     * Funzione che visualizza tutti gli eventi
     */
    function showAll(EUtente &$user, $eventi, $check=null)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $eventi);
        $this->smarty->assign('check', $check);
        $this->smarty->display('PLDCalendario.tpl');

    }

    /**
     * Funzione che visualizza il singolo evento
     */
    function show(EUtente &$user, $evento, $check = null , $error = null , $book = null){
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results', $evento);
        $this->smarty->assign('check', $check);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('book', $book);
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->display('PLDEvento.tpl');

    }

    /**
     * Funzione che visualizza la form di creazione evento
     */
    function create(EUtente &$user){
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('check', $this->check);
        $this->smarty->assign('prec', $_POST);
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('PLDNewEvento.tpl');

    }

    /**
     * Funzione che visualizza la form di modifica evento
     */
    function modify(EUtente &$user, $evento=null){
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('check', $this->check);
        $this->smarty->assign('results', $evento);
        $this->smarty->assign('prec', $_POST);
        $this->smarty->display('PLDEventoModifica.tpl');

    }

    /**
     * Funzione che crea l'oggetto EEvento a partire dalla form
     */
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
            $fascia=new EFascia();
            if (!empty($_POST["$foo"]) && !empty($_POST["$finale"]) && $foo==1){
                $inizio=(date_create_from_format("d/m/Y H:i:s",$_POST["$foo"]));
                $fine=(date_create_from_format("d/m/Y H:i:s",$_POST["$finale"]));
                $fascia->setData($inizio);
                $fascia->setDuratafromDate($fine);
                $fascia->setFine($fine);
                $evento->newFascia($fascia);
            }

                else if (empty($_POST["$foo"]) && empty($_POST["$finale"]) && $foo==1){
                    $inizio=(date_create_from_format("d/m/Y H:i:s",$_POST["$foo"]));
                    $fine=(date_create_from_format("d/m/Y H:i:s",$_POST["$finale"]));
                    $fascia->setData($inizio);
                    $fascia->setDuratafromDate($fine);
                    $fascia->setFine($fine);
                    $evento->newFascia($fascia);

                }
                else if (!empty($_POST["$foo"]) && !empty($_POST["$finale"])){
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
        $fasce=$evento->getFasce();
        foreach ($fasce as $value){
            $check=$value->validateStart() and $value->validateEnd();
            $this->check['Fasce']=  ($check and $this->check['Fasce']);
        }

        if($this->check['Nome'] && $this->check['Descrizione']
            && $this->check['NomeLuogo'] && $this->check['Cap']
            && $this->check['Via'] && $this->check['Citta'] && $this->check['Fasce'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Funzione che visualizza le prenotazioni di un evento
     */
    function prenotazioni($utenti, $evento){
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($utenti), 1)));
        $this->smarty->registerObject('user', $utenti);
        $this->smarty->assign('results', $evento->getPrenotazioni());
        $this->smarty->display('PLDPrenotazioni.tpl');

    }

    /**
     * Funzione che visualizza la schermata di upload immagine
     */
    function upload($utenti){
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($utenti), 1)));
        $this->smarty->registerObject('user', $utenti);
        $this->smarty->display('upload.tpl');

    }


}