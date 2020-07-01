<?php


class VRicerca extends VObject
{
    function __construct()
    {
        parent::__construct();
    }


    /**
     * Ritorna la coppia chiave-valore scelta dall'utente nella ricerca avanzata. Tale coppia
     * e' contenuta nell'array globale $_GET.
     * @return array avente come valori la chiave e il valore
     */
    function getStringAndKey(): array
    {
        $string =($_POST['Parametro']);
        $key =($_POST['TipoRicerca']);

        if ($key=="Autore")
            $key="UsernameUtente";
        if ($key=="Nome")
            $key="Nome";

        if (($_POST['Parametro'])=="")
            $string="Default";

        return array($string,$key);
    }

    /**
     * Mostra i risultati della ricerca
     * @param EUtente $user l'utente della sessione
     * @param array $array contenente i risultati della ricerca | NULL se nessun oggetto e' stato costruito
     * @param string $key la chiave di ricerca adoperata
     * @param string $value il valore di ricerca adoperato
     * @param string $string il dato ricercato dall'utente
     */
    function showSearchResult(EUtente &$user, $array)
    {
        $this->smarty->registerObject('user', $user);

        $this->smarty->assign('results', $array);

        //mostro il contenuto della pagine
        $this->smarty->display('TVGMainpage.tpl');
    }

}

