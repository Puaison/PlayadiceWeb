<?php


class VCatalogo extends VObject
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
    function showCatalogo(EUtente $user,$array)
    {
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results',$array );
        $this->smarty->display('GiochiMainPage.tpl');
    }

}