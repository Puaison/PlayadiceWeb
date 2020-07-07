<?php


class VGiocoInfo extends VObject
{
    function __construct()
    {
        parent::__construct();
    }
    /**
     * Mostra il Catalogo di Giochi
     * @param EUtente $user l'utente della sessione
     * @param array $array contenente i risultati della ricerca | NULL se nessun oggetto e' stato costruito
     */
    function showFormNewRecensione(EUtente $user)
    {

    }

    function showinfo(EUtente $user, EGioco $gioco)
    {
        //$this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        //$this->smarty->registerObject('gioco',$gioco);
        $this->smarty->assign('gioco',$gioco );
        $this->smarty->display('GiocoInfo.tpl');
    }

}