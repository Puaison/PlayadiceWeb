<?php



class EGioco extends EObject
{
    /** Il Nome del Gioco */
    private $Nome;

    /** Il voto medio calcolato attraverso le recensioni */
    private $VotoMedio = null;

    /** La categoria del gioco */
    private  $Categoria;

    /** EGiocoInfo rappresentante informazioni più complete dell'oggetto EGioco */
    private $GiocoInfo;

    /** Lista di ERecensioni effettuate sul EGioco */
    private $Recensioni=array();

    /****************************************** COSTRUTTORE **************************************************/

    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /****************************************** GETTER **************************************************/

    /**
     * @return string Il Nome del Gioco
     */
    function getNome() : string {
        return $this->Nome;
    }

    /**
     * @return float Il voto medio del Gioco
     */
    function getVotoMedio() : float {
        return $this->VotoMedio;
    }

    /**
     * @return string La categoria del Gioco
     */
    function getCategoria() : string {
        return $this->Categoria;
    }

    /**
     * @return EGiocoInfo Le informazioni dettagliate del gioco
     */
    function getInfo() : EGiocoInfo{
        return $this->GiocoInfo;
    }

    /**
     * @return array Tutte le recensioni di quel gioco
     */
    function getRecensioni() : array{
        return $this->Recensioni;
    }

    /********************************************** SETTER ************************************************/

    /**
     * @param string $nome il nome del Gioco
     */
    function setNome(string $nome) {
        $this->Nome=$nome;
    }



    /**
     * @param float $valore il valore del voto medio del gioco
     */
    function setVotoMedio(float $valore) {
        $this->VotoMedio=$valore;
    }



    /**
     * @param string $categoria il valore del voto medio del gioco
     */
    function setCategoria(string $categoria) {
        $this->Categoria=$categoria;
    }



    /**
     * @param EGiocoInfo $info il valore del voto medio del gioco
     */
    function setInfo(EGiocoInfo $info) {
        $this->GiocoInfo=$info;
    }

    /**
     * //TODO Problemi con questo metodo perchè gli passo un array
     * @param ERecensione ...$recensioni Recensioni che devono essere aggiunte al gioc
     */
    function setRecensioni($recensioni) {

        $this->Recensioni=  $recensioni;
    }
    /********************************************** ALTRE FUNZIONI ************************************************/

    /**
     * Metodo che aggiunge una recensione al Gioco
     * @param ERecensione $rec La recensione da aggiungere
     */
    function addRecensione(ERecensione $rec) {
        $this->Recensioni[]=$rec;
    }

    /**
     * Metodo che calcola il vgoto medio riprendendo tutte le recensioni
     * @return float Il VotoMedio calcolato sulle recensioni del Gioco
     */
    function CalcolaVotoMedio() :float {
        $somma=0;
        $array=array();
        $array=$this->Recensioni;

        foreach ($array as $rec)
        {
            $voto=$rec->getVoto();
            $somma=$somma+$voto;
        }
        $numerorec=count($array);
        $votomedio=$somma/$numerorec;
        return $votomedio;

    }

    /**
     * //TODO vedere come fare uscire la descrizione della funzione
     * Metodo che controlla se la recensione può essere effettuata
     * @param ERecensione $nuovarec La Nuova Recensione che devo controllare che
     * @return bool
     */
    function PossibileNuovaRecensione(ERecensione $nuovarec):bool {
        $array=array();
        $array=$this->Recensioni;
        foreach ($array as $rec)
        {
            $commentatore=$rec->getEUtente()->getUsername();
            if($commentatore==$nuovarec->getEUtente()->getUsername())
                return false;
        }
        //TODO Aggiungo direttamente la recensione oppure controllavo soltanto?
        $this->addRecensione($nuovarec);
        return true;


    }



}