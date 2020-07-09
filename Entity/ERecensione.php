<?php


/**
 * La classe ERecensione rappresenta le recensioni che L'Utente effettua su un EGioco.
 * Dovrà quindi avere il riferimento all'EUtente che ha recensito, il voto e il commento immessi.
 * @package Entity
 */

class ERecensione
{
    /** L'Oggetto EUtente che ha recensito */
    private $Utente;

    /** Il Voto associato */
    private $Voto;

    /** Il Commento associato*/
    private $Commento;

    /** Il Gioco associato*/
    private $Gioco;


    /****************************************** COSTRUTTORE **************************************************/

    /**
     * Default constructor
     */
    public function __construct()
    {
        //parent::__construct();
        $this->Gioco=new EGioco();
        $this->Utente=new EUtente();
    }

    /********************************************** GETTER ************************************************/

    /**
     *
     * @return EUtente l'Utente che ha recensito
     */
    public function getEUtente() : EUtente {

        return $this->Utente;

    }

    /**
     *
     * @return EGioco Il gioco a cui la recensione è associata
     */
    public function getEGioco() : EGioco {

        return $this->Gioco;

    }

    /**
     *
     * @return int Il voto della recensione
     */
    public function getVoto() : int {

        return $this->Voto;

    }

    /**
     *
     * @return string Il Commento della recensione
     */
    public function getCommento() : string {

        return $this->Commento;

    }
    /****************************************** SETTER **************************************************/
    /**
     *
     * @param  EUtente l'Utente che ha recensito
     */
    public function setEUtente(EUtente $user) {

        $this->Utente=$user;

    }

    /**
     *
     * @param  EGioco Il Gioco a cui la recensione è associata
     */
    public function setEGioco(EGioco $gioco) {

        $this->Gioco=$gioco;

    }

    /**
     *
     * @param  int Il voto della recensione
     */
    public function setVoto(int $voto) {

        $this->Voto=$voto;

    }

    /**
     *
     * @param string Il Commento della recensione
     */
    public function setCommento(string $commento)  {

        $this->Commento=$commento;

    }
    /********************************************** ALTRE FUNZIONI ************************************************/


    /**
     * Metodo che controlla se il voto inserito è compreso tra 0 e 5;
     * @return  bool true se le condizioni sono state rispettate. Falso altrimenti
     */
    public function validateVoto():bool {
        $voto=$this->Voto;
        if($voto==1 || $voto==2 || $voto==3 || $voto==4 || $voto==5)//Voto compreso tra 0 e 5
            return true;
        else
            return false;
    }

    /**
     * Metodo che controlla se il commento inserito ha meno di 500 caratteri;
     * @return  bool true se le condizioni sono state rispettate. Falso altrimenti
     */
    public function validateCommento():bool {
        $commento=$this->Commento;
        $lenght=(strlen($commento));
        if($lenght<=500 && preg_match('/^(\p{L})|([a-zA-Z0-9][a-zA-Z0-9 -])+$/ui', $this->Commento))
            return true;
        else
            return false;
    }


}