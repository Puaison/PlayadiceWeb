<?php

/**
 * La classe EGioco rappresenta l'entità e le informazioni principali del gioco
 */
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
    private $Recensioni;

    /****************************************** COSTRUTTORE **************************************************/

    /**
     * Default constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->Recensioni=array();
        $this->GiocoInfo=new EGiocoInfo();
    }

    /****************************************** GETTER **************************************************/

    /**
     * @return string Il Nome del Gioco
     */
    function getNome() : ?string {
        return $this->Nome;
    }

    /**
     * @return float Il voto medio del Gioco
     */
    function getVotoMedio() : ?float {
        return $this->VotoMedio;
    }

    /**
     * @return string La categoria del Gioco
     */
    function getCategoria() : ?string {
        return $this->Categoria;
    }

    /**
     * @return EGiocoInfo Le informazioni dettagliate del gioco
     */
    function getInfo() : ?EGiocoInfo{
        return $this->GiocoInfo;
    }

    /**
     * @return array Tutte le recensioni di quel gioco
     */
    function getRecensioni() : ?array{
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
        //round($valore,2);
        $this->VotoMedio=$numberAsString = number_format($valore, 2);;
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
     * @param Recensioni che devono essere aggiunte al gioc
     */
    function setRecensioni($recensioni) {

        $this->Recensioni=  $recensioni;
    }
    /********************************************** ALTRE FUNZIONI ************************************************/


    /**
     * Metodo che aggiunge una recensione all'array
     * dentro l'oggetto EGioco
     * @param ERecensione $rec La recensione da aggiungere
     */
    function addRecensione(ERecensione $rec) {
        $this->Recensioni[]=$rec;
        FPersistantManager::getInstance()->store($rec);
    }


    /**
     * Metodo che controlla se il nome del gioco inserito è lungo meno di 40  caratteri e ha solo numeri, lettere e spazi
     * @return bool true se le condizioni sono rispettate, false altrimenti
     */
    function validateNome() : bool
    {
        if ($this->Nome && strlen($this->Nome)<=40 && preg_match('/^(\p{L})|([a-zA-Z0-9 ])+$/ui', $this->Nome))
        {
            return true;
        }
        else
            return false;
    }

    /**
     * Metodo che controlla se la categoria del gioco inserito esiste tra quelle predefinite inizialmente nell'applicazione
     * @return bool true se la categoria esiste, false altrimenti
     */
    function validateCategoria() : bool
    {
        if($this->Categoria== EGiocoCategoria::Strategia || $this->Categoria== EGiocoCategoria::Party )
            return true;
        else
            return false;

    }



    /**
     * Metodo che calcola il voto medio del gioco
     * (usando le recensioni in $this->Recensioni),
     * salvandolo poi in $this->VotoMedio
     */
    function CalcolaVotoMedio() :void {
        $somma=0;
        $array=array();
        $array=$this->Recensioni;

        if(!empty($array)) {
            foreach ($array as $rec) {
                $voto = $rec->getVoto();
                $somma = $somma + $voto;
            }
            $numerorec = count($array);
            $votomedio = $somma / $numerorec;
            $this->VotoMedio = $votomedio;
        }
        else {
            $votomedio=0;
            $this->VotoMedio=0;
        }

    }

    /**
     * Metodo che controlla se un Utente può recensire un Gioco
     * (controlli eseguiti su $this->Recensioni)
     * @param EUtente $user l'utente che vorrebe recensire
     * @return bool true se non ha già recensito, false altrimenti
     */
    function possibileNuovaRecensione(EUtente $user):bool {
        $array=array();
        $array=$this->Recensioni;
        foreach ($array as $rec)
        {
            $creatore=$rec->getEUtente()->getUsername();
            if($creatore==$user->getUsername())
                return false;
        }
        return true;


    }


    /**
     * Metodo statico che permette di ottenere un oggetto EGioco comepleto
     * (con EGiocoInfo e le Erecensioni) dal DB
     * @param int $IdGioco l'identificativo del Gioco
     * @return EGioco
     */
    static function  getGiocoCompleto(int $IdGioco):EGioco
    {
        $gioco=new EGioco();
        if(FPersistantManager::getInstance()->exists("gioco", "Id" ,$IdGioco))
            $gioco = FPersistantManager::getInstance()->search("gioco", "Id" ,$IdGioco)[0];
        if(FPersistantManager::getInstance()->exists("giocoinfo", "IdGioco" ,$IdGioco))
            $gioco->setInfo(FPersistantManager::getInstance()->search("giocoinfo", "IdGioco" ,$gioco->getId())[0]);
        if(FPersistantManager::getInstance()->exists("recensione","IdGioco",$gioco->getId()))
            $gioco->setRecensioni(FPersistantManager::getInstance()->search("recensione","IdGioco",$gioco->getId()));

        return $gioco;

    }



}