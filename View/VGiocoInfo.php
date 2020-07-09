<?php


class VGiocoInfo extends VObject
{
    function __construct()
    {
        parent::__construct();
        $this->check = array(
            'Esistente' => false,
            'Voto' => true,
            'Commento' => true
        );
    }

    /**
     * Funzione che permette la creazione di un gioco con i valori prelevati da una form
     * @return EGioco l'utente ottenuto dai campi della form
     */
    function createRecensione() : ERecensione
    {
        $recensione = new ERecensione();

        if(isset($_POST['Voto']))
            $recensione->setVoto((int)$_POST['Voto']);
        if(isset($_POST['Commento']))
            $recensione->setCommento($_POST['Commento']);
        $recensione->setEUtente(CSession::getUserFromSession());

        return $recensione;
    }

    /**
     * Verifica che un una recensione appena creata rispetti tutti i parametri
     * @param ERecensione $recensione La nuova recensione da controllare
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateRecensione(ERecensione $recensione): bool
    {
        $this->check['Voto']=$recensione->validateVoto();
        $this->check['Commento']=$recensione->validateCommento();
        if($this->check['Voto'] && $this->check['Commento'])
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /**
     * Mostra il Catalogo di Giochi
     * @param EUtente $user l'utente della sessione
     * @param array $array contenente i risultati della ricerca | NULL se nessun oggetto e' stato costruito
     */
    function showFormNewRecensione(EUtente $user,EGioco $gioco)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('gioco',$gioco);
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('NuovaRecensione.tpl');

    }

    function showinfo(EUtente $user, EGioco $gioco,bool $recensito)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('gioco',$gioco );
        $this->check['Esistente']=$recensito;
        $this->smarty->assign('check', $this->check);
        //$this->smarty->assign('recensito',$recensito );
        $this->smarty->display('GiocoInfo.tpl');
    }

}