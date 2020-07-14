<?php


/**
 * La classe VCatalogo si occupa dell'input-output di tutti i giochi e delle loro informazioni princiapli.
 * Ovvero:
 * - dai dati inseriti dall'utente(admin) costruisce un oggetto EGioco(accertandosi attraverso
 * le funzioni di validazione dell'Entity che i dati inseriti siano validi)
 * - predispone e visualizza le varie pagine HTML per mostrare
 * la lista giochi e per la creazione/rimozione/modifica di un gioco.
 */
class VCatalogo extends VObject
{
    /**
     * In questa classe, l'array check controlla:
     * 1) 'Nome' - dice se il Nome del gioco inserito è valido
     * 2) 'Categoria' - dice se la Categoria del gioco inserito è valido
     * 3) 'Descrizione' - dice se la Descrizione del gioco inserito è valido
     * 4) 'NumeroMax' - dice se il NumeroMax di giocatori del gioco inseirito è valido
     * 5) 'NumeroMin' - dice se il NumeroMin di giocatori del gioco inseirito è valido
     * 6) 'CasaEditrice' - dice se la Casa Editrice del gioco inserito è valido
     */
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
     * Ritorna la coppia valore-chiave scelta dall'utente nella ricerca
     * Tale coppia e' contenuta nell'array globale $_POST
     * @return array avente come valori il Valore e la Chiave di ricerca
     */
    function getStringAndKey(): array
    {
        $string =($_POST['Parametro']);
        $key =($_POST['TipoRicerca']);

        if ($key=="Categoria")
            $key="Categoria";
        if ($key=="Nome")
            $key="Nome";

        if (($_POST['Parametro'])=="")
            $string="";

        return array($string,$key);
    }

    /**
     * Funzione che permette la creazione di un gioco con i valori prelevati da una form
     * @return EGioco il gioco ottenuto dai campi della form
     */
    function createGioco() : EGioco
    {
        $gioco = new EGioco();
        $giocoinfo=new EGiocoInfo();

        if(isset($_POST['IdGioco']))
        {
            $gioco->setId((int)$_POST['IdGioco']);
            $giocoinfo->setId((int)$_POST['IdGioco']);
        }
        if(isset($_POST['Nome']))
            $gioco->setNome($_POST['Nome']);
        if(isset($_POST['Categoria']))
            $gioco->setCategoria($_POST['Categoria']);




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
     * Verifica che un gioco rispetti tutti i parametri;
     * richiama le funzioni di validazione presenti in Entity
     * @param EGioco $gioco l'oggetto gioco da controllare
     * @return true se non si sono commessi errori, false altrimenti
     */
    function validateGioco(EGioco $gioco): bool
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
     * @param array $array contenente i risultati della ricerca | NULL se non c'è nessun gioco da mostrare
     */
    function showCatalogo(EUtente $user,$array)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('results',$array );
        $this->smarty->display('GiochiMainPage.tpl');
    }

    /**
     * Mostra la Form per la creazione di un nuovo gioco
     * @param EUtente $user l'utente di sessione
     * @param EGioco|null $gioco TODO gioco appena isneito?
     */
    function showFormNewGioco(EUtente $user, EGioco $gioco=null)
    {
        if(!$gioco) {
            $gioco = new EGioco();
        }
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('gioco', $gioco);
        $this->smarty->assign('check', $this->check);
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('NuovoGioco.tpl');
    }

    /**
     * Mostra la Form per la modifica del gioco
     * @param EUtente $user l'utente di sessione
     * @param EGioco $gioco il gioco da modificare
     */
    function showFormModificaGioco(EUtente $user, EGioco $gioco)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('gioco', $gioco);
        $this->smarty->assign('check', $this->check);
        $this->smarty->registerObject('user', $user);
        $this->smarty->display('ModificaGioco.tpl');
    }

}