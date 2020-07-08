<?php


class VGiocoInfo extends VObject
{
    function __construct()
    {
        parent::__construct();
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
        if(isset($_POST['IdGioco']))
            $recensione->getEGioco()->setId($_POST['IdGioco']);


        return $recensione;
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
        $this->smarty->display('NuovaRecensione.tpl');

    }

    function showinfo(EUtente $user, EGioco $gioco,bool $recensito)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        //$this->smarty->registerObject('gioco',$gioco);
        $this->smarty->assign('gioco',$gioco );
        $this->smarty->assign('recensito',$recensito );
        $this->smarty->display('GiocoInfo.tpl');
    }

}