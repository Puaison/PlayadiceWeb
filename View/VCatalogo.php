<?php


class VCatalogo extends VObject
{
    function __construct()
    {
        parent::__construct();
        $this->check = array(
            'Nome' => true,
            'Categoria' => true,
            'Descrizione' => true,
            'NumeroMax' => true,
            'NumeroMin' => true,
            'CasaEditrice' => true,
        );
    }

    /**
     * Funzione che permette la creazione di un gioco con i valori prelevati da una form
     * @return EGioco l'utente ottenuto dai campi della form
     */
    function createGioco() : EGioco
    {
        $gioco = new EGioco();

        if(isset($_POST['Nome']))
            $gioco->setNome($_POST['Nome']);
        if(isset($_POST['Categoria']))
            $gioco->setCategoria($_POST['Categoria']);

        $giocoinfo=new EGiocoInfo();


        if(isset($_POST['Descrizione']))
            $giocoinfo->setDescrizione($_POST['Descrizione']);
        if(isset($_POST['NumeroMax']))
            $giocoinfo->setMax((int)$_POST['NumeroMax']);
        if(isset($_POST['NumeroMin']))
            $giocoinfo->setMin((int)$_POST['NumeroMin']);
        if(isset($_POST['CasaEditrice']))
            $giocoinfo->setCasaEditrice($_POST['CasaEditrice']);
        $gioco->setInfo($giocoinfo);

        return $gioco;
    }

    /**
     * Verifica che un utente abbia rispettato i vincoli per l'inserimento dei parametri
     * del nuovo Gioco
     * @param EGioco $gioco l'oggetto gioco da controllare
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateNuovoGioco(EGioco $gioco): bool
    {
        $this->check['Nome']=$gioco->validateNome();
        $this->check['Categoria']=$gioco->validateCategoria();
        $this->check['Descrizione']=$gioco->getInfo()->validateDescrizione();
        $this->check['NumeroMax']=$gioco->getInfo()->validateNumMax();
        $this->check['NumeroMin']=$gioco->getInfo()->validateNumMin();
        $this->check['CasaEditrice']=$gioco->getInfo()->validateCasaEditrice();

        if($this->check['Nome'] && $this->check['Categoria']
            && $this->check['Descrizione'] && $this->check['NumeroMax']
        && $this->check['NumeroMin'] && $this->check['CasaEditrice'])
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
    function showCatalogo(EUtente $user,$array)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results',$array );
        $this->smarty->display('GiochiMainPage.tpl');
    }

    function showFormNewGioco(EUtente $user, EGioco $gioco=null)
    {
        if(!$gioco) {
            $gioco = new EGioco();
        }
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        //$gioco->setNome("aaggagaga");
        $this->smarty->assign('prec', $_POST);
        $this->smarty->assign('gioco', $gioco);
        $this->smarty->assign('check', $this->check);
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('NuovoGioco.tpl');
    }

}