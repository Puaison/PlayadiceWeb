<?php
/**
 * Class EEvento CLasse utilizzata per realizzare gli Eventi
 */
class EEvento extends EObject
{
    /**
     * @var string Nome dell'evento
     */
    private $nomeEvento;
    /**
     * @var string Categoria Evento
     */
    private $categoria;
    /**
     * @var bool flag che serve all'abilitazione delle prenotazioni
     */
    private $flagPrenotazione;
    /**
     * @var ELuogo Luogo in cui si terrà l'evento
     */
    private $luogoEvento;
    /**
     * @var array lista delle fasce orarie dell'evento
     */
    private $listaFasce=array();
    /**
     * @var array lista delle prenotazioni all'evento
     */
    private $listaPrenotazioni=array();
    private $testo;
    /**
     * EEvento constructor. Inizializza un oggetto Evento Vuoto
     */

    function __construct()
    {
        parent ::__construct();
    }
    /**
     *                                                    METODI SET
     *
     * Metodo per settare interamente un evento
     * @param int $eventId
     * @param string $name
     * @param string $category
     * @param int $flag
     * @param EFascia ...$fascia
     */
    function setEvento(int $eventId, string $name, string $category, bool $flag,ELuogo $location, array $fascia, String $testo)
    {
        $this ->luogoEvento = $location;
        $this -> id = $eventId;
        $this -> nomeEvento = $name;
        $this -> categoria = $category;
        $this -> flagPrenotazione = $flag;
        $this->listaFasce=$fascia;
        $this->testo=$testo;
    }
    /**
     * Metodo per impostare il testo dell'evento
     *
     */
    function setTesto(string $testo){$this->testo=$testo;}
    /**
     *
     * Metodo per impostare la categoria
     * @param string $category
     */
    function setCategoria(string $category){$this->categoria=$category;}
    /**
     * Metodo per impostare il nome dell'evento
     * @param strin $nome
     */
    function setNome(string $nome){$this->nomeEvento=$nome;}
    /**
     * Metodo per impostare la possibilità di prenotazione
     * @param bool $flag
     */
   function setFlag(int $flag){
        $this->flagPrenotazione=$flag;
    }
    /**
     * Metodo per impostare il luogo dell'evento
     * @param ELuogo $place
     */
    function setLuogo(ELuogo $place){$this->luogoEvento=$place;}
    /**
     * Metodo per inserire una nuova fascia oraria nell'array
     * @param EFascia $fascia
     */
    function newFascia(EFascia $fascia){array_push($this->listaFasce,$fascia);}
    /**
     * Metodo per inserire una prenotazione nell'array
     * @param EPrenotazione $prenotazione
     */function newPrenotazione(EPrenotazione $prenotazione){array_push($this->listaPrenotazioni,$prenotazione);}
    /**
     *                                                       METODI GET
     *
     * Metodo che restituisce il nome dell'evento in formato stringa
     * @return string
     */
    function getNome(): string {return $this->nomeEvento;}

    /**
     * Metodo che restituisce il testo dell'evento
     * @return string
     */
    function getTesto(): string {return $this->testo;}

    /**
     *
     *  Metodo che restituisce la categoria dell'evento
     * @return string
     */

    function getCategoria(): string {return $this->categoria;}

    /**
     * Metodo che restituiscei il valore del flag di prenotazione
     * @return bool
     */
    function getFlag():int{return $this->flagPrenotazione;}

    /**
     * Metodo che restituisce il luogo dell'evento
     * @return ELuogo
     */
    function getLuogo():ELuogo{return $this->luogoEvento;}

    /**
     * Metodo che restituisce la data di inizio dell'evento
     * @return DateTime
     */
    function getStartDate():DateTime{
        $fascia=$this->listaFasce;
        $fascia=$fascia[0];
        return $fascia->getData();
    }

    /**
     * Metodo che resstituisce la data di fine dell'evento
     * @return DataTime
     */
    function getEndDate():DateTime{
        $fascia=$this->listaFasce[count($this->listaFasce)-1];
        return $fascia->getData();}

    /**
     * Metodo che restituisce l'array delle fasce orarie
     * @return array
     */
    function getFasce():array{return $this->listaFasce;}

    /**
     * Mmetodo che restituisce l'array delle prenotazioni
     * @return array
     */
    function getPrenotazioni():array{return $this->listaPrenotazioni;}

    /** Metodo che restituisce la posizione giornaliera dell'evento
     * @return string
     */
    function getPosizione():string
    {
        $oggi = $this -> getStartDate();
        return $oggi -> getPosizione();
    }

    /**
     * Metodo utilizzato per il sorting degli eventi
     * @param $a
     * @param $b
     * @return int
     */
    function eventSorter(EEvento $a, EEvento $b){
        if ($a->getPosizione()==$b->getPosizione()) return 0;
        return ($a->getPosizione()<$b->getCategory())?-1:1;
    }
    /**
     * Metodo che restituisce l'informazioni dell'evento in forma di stringa
     * @return string
     */


    function __toString()
    {
        $prenotazioni = "";
        $date = "";
        foreach ($this -> getPrenotazioni() as $value) {
            $prenotazioni .= $prenotazioni . " " . $value -> __toString() . "\n";
        }
        foreach ($this -> getFasce() as $value) {

            $date .= " " . date_format($value->getData(),"d/m/Y H:i:s"). "\n";
        }
        return $print = "NOME: " . $this -> getNome() . " | CATEGORIA: " . $this -> getCategoria() . " | DATA DI INIZIO: " .  date_format($this -> getStartDate(),"d/m/Y H:i:s") .
            " | DATA DI FINE: " .date_format($this -> getEndDate(),"d/m/Y H:i:s")  .
            " | FASCE ORARIE: " . $date . " | PRENOTATI: " . $prenotazioni;
    }
}
