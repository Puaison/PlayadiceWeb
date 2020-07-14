<?php


/**
 * La classe VGiocoInfo si occupa dell'input-output per quanto riguarda i dati dei giochi e delle sue recensioni associate.
 * Ovvero:
 * - dai dati inseriti dall'utente costruisce un oggetto ERecensione(accertandosi attraverso
 * le funzioni di validazione dell'Entity che i dati inseriti siano validi)
 * - predispone e visualizza le varie pagine HTML per mostrare
 * tutte le informazioni di un gioco e per la creazione/rimozione di una recensione.
 */
class VGiocoInfo extends VObject
{
    /**
     * In questa classe, l'array check controlla:
     * 1) 'Esistente' - dice se l'utente in sessione ha recensito
     * 2) 'Voto' - dice se il voto della recensione inserita è valido
     * 3) 'Commento' - dice se il Commento della recensione inserita è valido
     */
    function __construct()
    {
        parent::__construct();
        $this->check = array(
            'Esistente' => false,
            'Voto' => true,
            'Commento' => true,
        );
    }

    /**
     * Funzione che permette la creazione di una recensione con i valori prelevati da una form
     * e l'utente loggato presente in sessione
     * @return ERecensione
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
     * Verifica che un una recensione rispetti tutti i parametri,
     * notificando nell'array $this->Check eventuali campi errati;
     * richiama le funzioni di validazione presenti in Entity
     * @param ERecensione $recensione La nuova recensione da controllare
     * @return true se è una recensione valida, false altrimenti
     */
    function validateRecensione(ERecensione $recensione): bool
    {
        //TODO QUI CONTROLLO L'ESISTENZA DELLA RECENSIONE?
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
     * Mostra la Form per inserire la nuova recensione.
     * Inoltre grazie all'ausilio dell'array $this->>Check, è possiile
     * segnalare i campi sbagliati
     * @param EUtente $user l'utente della sessione
     * @param EGioco $gioco il gioco su cui si vuole effettuare la recensione
     */
    function showFormNewRecensione(EUtente $user,EGioco $gioco)
    {
        //TODO assegnare e vedere se ha già recensito?
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->assign('gioco',$gioco);
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('NuovaRecensione.tpl');

    }

    /**
     * Mostra tutte le informazioni e le recensioni di un gioco.
     * Inoltre, se ha già recensito non mostra il tasto di recensione
     * @param EUtente $user l'utente di sessione
     * @param EGioco $gioco il gioco che si vuole visionare
     * @param bool $recensito che ci dice se l'utente ha già recensito oppure no
     */
    function showInfo(EUtente $user, EGioco $gioco, bool $recensito)
    {
        $this->smarty->assign('UtenteType', lcfirst(substr(get_class($user), 1)));
        $this->smarty->registerObject('user', $user);
        $this->smarty->assign('gioco',$gioco );
        $this->check['Esistente']=$recensito;
        $this->smarty->assign('check', $this->check);
        $this->smarty->display('GiocoInfo.tpl');
    }

}